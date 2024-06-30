<?php

namespace App\Filament\Fields;

use Closure;
use Filament\Forms\Components\Builder as BaseBuilder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class ExtendedBuilder extends BaseBuilder
{
    protected string | Closure | null $relationshipName = null;
    protected ?Collection $cachedExistingRecords = null;
    protected string | Closure | null $orderColumn = null;
    protected ?Closure $modifyRelationshipQueryUsing = null;
    protected ?Closure $mutateRelationshipDataBeforeCreateUsing = null;
    protected ?Closure $mutateRelationshipDataBeforeSaveUsing = null;
    protected ?Closure $mutateRelationshipDataBeforeFillUsing = null;
    private $hydratedDefaultState;

    public function relationship(string | Closure | null $name = null, ?Closure $modifyQueryUsing = null): static
    {
        $this->relationshipName = $name ?? $this->getName();
        $this->modifyRelationshipQueryUsing = $modifyQueryUsing;

        $this->afterStateHydrated(function ($component) {
            if (!is_array($component->hydratedDefaultState)) {
                return;
            }
            $component->mergeHydratedDefaultStateWithChildComponentContainerState();
        });

        $this->loadStateFromRelationshipsUsing(function ($component) {
            $component->clearCachedExistingRecords();
            $component->fillFromRelationship();
        });

        $this->saveRelationshipsUsing(function ($component, $livewire, ?array $state) {
            if (!is_array($state)) {
                $state = [];
            }

            $relationship = $component->getRelationship();
            $existingRecords = $component->getCachedExistingRecords();
            $recordsToDelete = [];

            foreach ($existingRecords->pluck($relationship->getRelated()->getKeyName()) as $keyToCheckForDeletion) {
                if (array_key_exists("record-{$keyToCheckForDeletion}", $state)) {
                    continue;
                }

                $recordsToDelete[] = $keyToCheckForDeletion;
            }

            $relationship->whereKey($recordsToDelete)->get()->each(fn (Model $record) => $record->delete());
            $childComponentContainers = $component->getChildComponentContainers();
            $itemOrder = 1;
            $orderColumn = $component->getOrderColumn();
            $translatableContentDriver = $livewire->makeFilamentTranslatableContentDriver();

            foreach ($childComponentContainers as $itemKey => $item) {
                $itemData = $item->getState(shouldCallHooksBefore: false);

                if ($orderColumn) {
                    $itemData[$orderColumn] = $itemOrder;
                    $itemOrder++;
                }

                if ($record = ($existingRecords[$itemKey] ?? null)) {
                    $itemData = $component->mutateRelationshipDataBeforeSave($itemData, record: $record);

                    if ($itemData === null) {
                        continue;
                    }

                    $translatableContentDriver ? $translatableContentDriver->updateRecord($record, $itemData) : $record->fill($itemData)->save();
                    continue;
                }

                $relatedModel = $component->getRelatedModel();
                $itemData = $component->mutateRelationshipDataBeforeCreate($itemData);

                if ($itemData === null) {
                    continue;
                }

                if ($translatableContentDriver) {
                    $record = $translatableContentDriver->makeRecord($relatedModel, $itemData);
                } else {
                    $record = new $relatedModel();
                    $record->fill($itemData);
                }

                $record = $relationship->save($record);
                $item->model($record)->saveRelationships();
            }
        });

        $this->dehydrated(false);
        $this->disableItemMovement();

        return $this;
    }

    public function fillFromRelationship(): void
    {
        $this->state($this->getStateFromRelatedRecords($this->getCachedExistingRecords()));
    }

    protected function getStateFromRelatedRecords(Collection $records): array
    {
        if (!$records->count()) {
            return [];
        }

        $translatableContentDriver = $this->getLivewire()->makeFilamentTranslatableContentDriver();

        return $records->map(function (Model $record) use ($translatableContentDriver): array {
            $data = $translatableContentDriver ? $translatableContentDriver->getRecordAttributesToArray($record) : $record->attributesToArray();
            return $this->mutateRelationshipDataBeforeFill($data);
        })->toArray();
    }

    public function getRelationship(): HasOneOrMany | BelongsToMany | null
    {
        if (!$this->hasRelationship()) {
            return null;
        }

        return $this->getModelInstance()->{$this->getRelationshipName()}();
    }

    public function getRelationshipName(): ?string
    {
        return $this->evaluate($this->relationshipName);
    }

    public function getCachedExistingRecords(): Collection
    {
        if ($this->cachedExistingRecords) {
            return $this->cachedExistingRecords;
        }

        $relationship = $this->getRelationship();
        $relatedKeyName = $relationship->getRelated()->getKeyName();
        $relationshipName = $this->getRelationshipName();
        $orderColumn = $this->getOrderColumn();

        if ($this->getModelInstance()->relationLoaded($relationshipName) && !$this->modifyRelationshipQueryUsing) {
            return $this->cachedExistingRecords = $this->getRecord()->getRelationValue($relationshipName)
                ->when(filled($orderColumn), fn (Collection $records) => $records->sortBy($orderColumn))
                ->mapWithKeys(fn (Model $item): array => ["record-{$item[$relatedKeyName]}" => $item]);
        }

        $relationshipQuery = $relationship->getQuery();

        if ($relationship instanceof BelongsToMany) {
            $relationshipQuery->select([$relationship->getTable() . '.*', $relationshipQuery->getModel()->getTable() . '.*']);
        }

        if ($this->modifyRelationshipQueryUsing) {
            $relationshipQuery = $this->evaluate($this->modifyRelationshipQueryUsing, ['query' => $relationshipQuery]) ?? $relationshipQuery;
        }

        if (filled($orderColumn)) {
            $relationshipQuery->orderBy($orderColumn);
        }

        return $this->cachedExistingRecords = $relationshipQuery->get()->mapWithKeys(fn (Model $item): array => ["record-{$item[$relatedKeyName]}" => $item]);
    }

    public function clearCachedExistingRecords(): void
    {
        $this->cachedExistingRecords = null;
    }

    public function getRelatedModel(): string
    {
        return $this->getRelationship()->getModel()::class;
    }

    public function hasRelationship(): bool
    {
        return filled($this->getRelationshipName());
    }

    public function orderColumn(string | Closure | null $column = 'sort'): static
    {
        $this->orderColumn = $column;
        $this->reorderable($column);

        return $this;
    }

    protected function mergeHydratedDefaultStateWithChildComponentContainerState(): void
    {
        $state = $this->getState();
        $items = $this->hydratedDefaultState;

        foreach ($items as $itemKey => $itemData) {
            $items[$itemKey] = [...$state[$itemKey] ?? [], ...$itemData];
        }

        $this->state($items);
    }

    public function mutateRelationshipDataBeforeCreateUsing(?Closure $callback): static
    {
        $this->mutateRelationshipDataBeforeCreateUsing = $callback;
        return $this;
    }

    public function mutateRelationshipDataBeforeSaveUsing(?Closure $callback): static
    {
        $this->mutateRelationshipDataBeforeSaveUsing = $callback;
        return $this;
    }

    public function mutateRelationshipDataBeforeFillUsing(?Closure $callback): static
    {
        $this->mutateRelationshipDataBeforeFillUsing = $callback;
        return $this;
    }

    protected function mutateRelationshipDataBeforeCreate(array $data): ?array
    {
        if ($this->mutateRelationshipDataBeforeCreateUsing instanceof Closure) {
            $data = $this->evaluate($this->mutateRelationshipDataBeforeCreateUsing, ['data' => $data]);
        }
        return $data;
    }

    protected function mutateRelationshipDataBeforeSave(array $data, Model $record): ?array
    {
        if ($this->mutateRelationshipDataBeforeSaveUsing instanceof Closure) {
            $data = $this->evaluate($this->mutateRelationshipDataBeforeSaveUsing, namedInjections: ['data' => $data, 'record' => $record], typedInjections: [Model::class => $record, $record::class => $record]);
        }
        return $data;
    }

    protected function mutateRelationshipDataBeforeFill(array $data): array
    {
        if ($this->mutateRelationshipDataBeforeFillUsing instanceof Closure) {
            $data = $this->evaluate($this->mutateRelationshipDataBeforeFillUsing, ['data' => $data]);
        }
        return $data;
    }


}

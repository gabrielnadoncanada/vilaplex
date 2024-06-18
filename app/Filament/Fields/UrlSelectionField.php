<?php

namespace App\Filament\Fields;

use App\Models\Blog\Post as BlogPost;
use App\Models\Service\Post as ServicePost;
use App\Models\CustomType\CustomType;
use App\Models\Page;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;

class UrlSelectionField extends Forms\Components\Field
{
    protected string $view = 'filament-forms::components.group';

    protected array|Closure $extraFields = [];

    public function getChildComponents(): array
    {
        return [
            $this->createTypeSelect(),
            $this->createSchemaGroup('data', 'type', fn(Get $get) => $this->getSchemaByType($get('type'))),
            $this->createExtraFieldsGroup('data'),
        ];
    }

    protected function createTypeSelect(): Select
    {
        return Select::make('type')
            ->label(__('filament.menu.items-modal.type'))
            ->options($this->getItemTypeOptions())
            ->afterStateUpdated(function ($state, Select $component) {
                $component->getContainer()->getComponent(fn(Component $component) => $component instanceof Group)
                    ?->getChildComponentContainer()
                    ->fill();
            })
            ->reactive();
    }

    protected function createSchemaGroup(string $statePath, string $condition, callable $schema): Group
    {
        return Group::make()
            ->statePath($statePath)
            ->whenTruthy($condition)
            ->schema($schema);
    }

    protected function createExtraFieldsGroup(string $statePath): Group
    {
        return Group::make()
            ->statePath($statePath)
            ->visible(fn(Component $component) => !empty($component->evaluate($this->extraFields)))
            ->schema(fn(Component $component) => $this->extraFields);
    }

    protected function getSchemaByType(?string $type): array
    {
        return $this->getItemTypes()[$type]['fields'] ?? [];
    }

    protected function getItemTypeOptions(): array
    {
        return array_combine(
            array_keys($this->getItemTypes()),
            array_column($this->getItemTypes(), 'name')
        );
    }

    public function getItemTypes(): array
    {
        return [
            'External' => [
                'name' => 'External',
                'fields' => $this->buildLinkFields(fn() => TextInput::make('url')
                    ->label(__('filament.menu.attributes.url'))
                    ->required())
            ],
            'App\Models\Blog\Post' => [
                'name' => 'Blog post',
                'fields' => $this->buildLinkFields(fn() => Select::make('url')
                    ->options(BlogPost::pluck('title', 'id')->toArray())
                    ->live()
                    ->label(__('filament.menu.attributes.url'))
                    ->required())
            ],
            'App\Models\Service\Post' => [
                'name' => 'Service post',
                'fields' => $this->buildLinkFields(fn() => Select::make('url')
                    ->options(ServicePost::pluck('title', 'id')->toArray())
                    ->live()
                    ->label(__('filament.menu.attributes.url'))
                    ->required())
            ],
            'App\Models\Page' => [
                'name' => 'Page',
                'fields' => $this->buildLinkFields(fn() => Select::make('url')
                    ->options(Page::pluck('title', 'id')->toArray())
                    ->live()
                    ->label(__('filament.menu.attributes.url'))
                    ->required())
            ],
        ];
    }

    protected function buildLinkFields(callable $urlFieldFactory): array
    {
        return [
            TextInput::make('label')
                ->label(__('filament.menu.items-modal.label'))
                ->required(),
            $urlFieldFactory(),
            Select::make('target')
                ->label(__('filament.menu.attributes.target'))
                ->options([
                    '' => __('filament.menu.select-options.same-tab'),
                    '_blank' => __('filament.menu.select-options.new-tab'),
                ])
                ->default('')
                ->selectablePlaceholder(false),
        ];
    }
}

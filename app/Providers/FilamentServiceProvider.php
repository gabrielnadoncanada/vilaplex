<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\AssociateAction;
use Filament\Tables\Actions\DetachAction;
use Filament\Tables\Actions\DetachAction as TableDetachAction;
use Filament\Tables\Actions\DeleteAction as TableDeleteAction;
use Filament\Tables\Actions\EditAction as TableEditAction;
use Filament\Tables\Actions\ReplicateAction as TableReplicateAction;
use Filament\Tables\Actions\ViewAction as TableViewAction;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class FilamentServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->configureTable();
        $this->configureColumns();
        $this->configureForm();
//        $this->configureFilamentShield();
//        $this->registerRenderHook();
//        $this->configureFileUpload();
    }

    protected function configureTable(): void
    {
        Table::configureUsing(
            fn(Table $table) => $table
                ->filtersTriggerAction(
                    fn(Action $action) => $action
                        ->button()
                        ->label('Filtres'),
                )->filtersFormWidth('2xl')
                ->paginationPageOptions([5, 10, 25, 50])
        );


        TableEditAction::configureUsing(function (TableEditAction $action) {
            $action->tooltip($action->getLabel());
            $action->label('');
        }, isImportant: true);

        TableDetachAction::configureUsing(function (TableDetachAction $action) {
            $action->tooltip($action->getLabel());
            $action->label('');
        }, isImportant: true);

        TableDeleteAction::configureUsing(function (TableDeleteAction $action) {
            $action->tooltip($action->getLabel());
            $action->label('');
        }, isImportant: true);

        TableViewAction::configureUsing(function (TableViewAction $action) {
            $action->tooltip($action->getLabel());
            $action->label('');
        }, isImportant: true);

        TableReplicateAction::configureUsing(function (TableReplicateAction $action) {
            $action->tooltip($action->getLabel());
            $action->label('');
        }, isImportant: true);
    }

    protected function configureColumns(): void
    {
        Column::configureUsing(function (Column $column): void {
            $column
                ->toggleable()
                ->sortable();
        });

        TextColumn::configureUsing(function (TextColumn $column): void {
            $column->searchable();
        });

        ImageColumn::configureUsing(function (ImageColumn $column): void {
//            $column->disk(config('filesystems.default'))->visibility('private');
        }, isImportant: true);
    }

    protected function configureForm(): void
    {
        Forms\Components\DatePicker::configureUsing(function ($component) {
            $component->default(now());
        });
        Forms\Components\TextInput::configureUsing(function ($component) {
            $component->maxLength(255);
        });
        Forms\Components\Textarea::configureUsing(function ($component) {
            $component->maxLength(65000);
        });

        Forms\Components\Repeater::configureUsing(function (Forms\Components\Repeater $component) {
            $component
                ->collapseAllAction(fn($action) => $action->icon('heroicon-o-arrows-pointing-in'))
                ->expandAllAction(fn($action) => $action->icon('heroicon-o-arrows-pointing-out'));
        });
    }

    protected function configureFilamentShield(): void
    {
        FilamentShield::configurePermissionIdentifierUsing(
            function ($resource) {
                $resource = Str::of($resource)
                    ->afterLast('Resources\\')
                    ->before('Resource')
                    ->replace('\\', '::');
                if ($resource->contains('::')) {

                    return str($resource)->beforeLast('::') . '::' . str($resource)->afterLast('::')->lcfirst();
                }

                return str($resource)->lcfirst();
            }
        );
    }

    protected function registerRenderHook(): void
    {
        Filament::registerRenderHook(
            'panels::body.start',
            fn(): View => view('components.staging-banner'),
        );
    }

    protected function configureFileUpload(): void
    {
        FileUpload::configureUsing(fn(FileUpload $fileUpload) => $fileUpload->disk(config('filesystems.default'))->visibility('private'));
    }
}

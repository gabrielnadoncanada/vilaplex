<?php

namespace App\Filament\Resources\ServiceResource\RelationManagers;

use App\Filament\Resources\CategoryResource;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\Concerns\Translatable;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\DetachAction;
use Filament\Tables\Actions\DetachBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Table;

class CategoriesRelationManager extends RelationManager
{

    use Translatable;

    protected static string $relationship = 'categories';

    protected static ?string $recordTitleAttribute = 'title';

    public function form(Form $form): Form
    {
        return CategoryResource::form($form);
    }

    public function table(Table $table): Table
    {
        return CategoryResource::table($table)
            ->headerActions([
                AttachAction::make()->preloadRecordSelect(),
                CreateAction::make(),
            ])
            ->actions([
                EditAction::make(),
                DetachAction::make(),
                DeleteAction::make(),
            ])
            ->groupedBulkActions([
                DetachBulkAction::make(),
                DeleteBulkAction::make(),
            ]);
    }
}

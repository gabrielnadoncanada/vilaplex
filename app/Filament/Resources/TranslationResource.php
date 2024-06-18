<?php

namespace App\Filament\Resources;

use App\Models\Translation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Table;
use Illuminate\Validation\Rules\Unique;

class TranslationResource extends Resource
{
    use Translatable;

    protected static ?string $model = Translation::class;

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $navigationIcon = 'heroicon-o-language';

    protected static ?string $navigationGroup = 'Site';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('group')
                    ->required(),
                Forms\Components\TextInput::make('key')
                    ->required()
                    ->unique(modifyRuleUsing: function (Unique $rule, callable $get) {
                        return $rule
                            ->where('key', $get('key'))
                            ->where('group', $get('group'));
                    }),
                Forms\Components\TextInput::make('value')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('group'),
                Tables\Columns\TextColumn::make('key'),
                Tables\Columns\TextColumn::make('value')->wrap(),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    EditAction::make(),
                    DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\TranslationResource\Pages\ListTranslations::route('/'),
            'create' => \App\Filament\Resources\TranslationResource\Pages\CreateTranslation::route('/create'),
            'edit' => \App\Filament\Resources\TranslationResource\Pages\EditTranslation::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Fields\MenuBuilder;
use App\Models\Navigation;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class NavigationResource extends Resource
{
    protected static ?string $model = Navigation::class;

    protected static ?string $navigationIcon = 'heroicon-o-bars-3';

    protected static ?string $navigationGroup = 'Site';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('')->schema([
                    TextInput::make('title')
                        ->label(__('filament.menu.attributes.title'))
                        ->reactive()
                        ->debounce()
                        ->afterStateUpdated(function (?string $state, Set $set) {
                            if (! $state) {
                                return;
                            }

                            $set('handle', Str::slug($state));
                        })
                        ->required(),
                    Hidden::make('handle')
                        ->label(__('filament.menu.attributes.handle'))
                        ->required()
                        ->unique(column: 'handle', ignoreRecord: true),
                    MenuBuilder::make('items')
                        ->label(__('filament.menu.attributes.items'))
                        ->default([])
                        ->columnSpanFull(),
                ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label(__('filament.menu.attributes.title'))
                    ->searchable(),
                TextColumn::make('handle')
                    ->label(__('filament.menu.attributes.handle'))
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label(__('filament.menu.attributes.created_at'))
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->label(__('filament.menu.attributes.updated_at'))
                    ->dateTime()
                    ->sortable(),
            ])
            ->actions([
                ActionGroup::make([
                    EditAction::make(),
                    DeleteAction::make(),
                ]),
            ])
            ->filters([

            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\NavigationResource\Pages\ListNavigations::route('/'),
            'create' => \App\Filament\Resources\NavigationResource\Pages\CreateNavigation::route('/create'),
            'edit' => \App\Filament\Resources\NavigationResource\Pages\EditNavigation::route('/{record}/edit'),
        ];
    }
}

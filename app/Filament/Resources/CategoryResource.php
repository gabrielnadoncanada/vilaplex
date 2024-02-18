<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages\CreateCategory;
use App\Filament\Resources\CategoryResource\Pages\EditCategory;
use App\Filament\Resources\CategoryResource\Pages\ListCategories;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class CategoryResource extends Resource
{
    use Translatable;

    protected static ?string $model = Category::class;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?int $navigationSort = 3;

    protected static ?string $label = 'Catégorie';

    protected static ?string $title = 'Catégorie';

    protected static ?string $pluralLabel = 'catégories';

    protected static ?string $pluralModelLabel = 'catégories';

    public static function getNavigationLabel(): string
    {
        return __('filament.categories.title');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('filament.navigation.groups.general');
    }

    public static function getLabel(): ?string
    {
        return __('filament.categories.title');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema(static::getFormSchema())
                    ->columnSpan(['lg' => 2]),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make(__('filament.categories.fields.featured_image'))
                            ->schema([
                                Forms\Components\FileUpload::make('featured_image')
                                    ->image()
                                    ->directory('categories/featured_images')
                                    ->required()
                                    ->label(__('filament.categories.fields.featured_image')),
                            ]),
                    ])
                    ->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('featured_image')
                    ->width('100px')
                    ->label(__('filament.categories.fields.featured_image')),
                Tables\Columns\TextColumn::make('title')
                    ->label(__('filament.categories.fields.title')),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('filament.categories.fields.created_at'))
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('filament.categories.fields.updated_at'))
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->groupedBulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCategories::route('/'),
            'create' => CreateCategory::route('/create'),
            'edit' => EditCategory::route('/{record}/edit'),
        ];
    }

    public static function getFormSchema(): array
    {
        return [
            Forms\Components\Grid::make()
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label(__('filament.categories.fields.title'))
                        ->required()
                        ->maxValue(50),
                    Forms\Components\TextInput::make('slug')
                        ->disabled()
                ]),
        ];
    }
}

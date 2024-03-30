<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages\ListCategories;
use App\Models\Category;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class CategoryResource extends Resource
{
    use Translatable;

    protected static ?string $model = Category::class;

    protected static ?string $recordTitleAttribute = 'title';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationLabel(): string
    {
        return __('filament.categories.title');
    }

    public static function getLabel(): ?string
    {
        return __('filament.categories.title');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema(self::getFormFieldSchema());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('featured_image')
                    ->width('100px')
                    ->label(__('filament.fields.featured_image')),
                TextColumn::make('title')
                    ->label(__('filament.fields.title')),
                TextColumn::make('created_at')
                    ->label(__('filament.fields.created_at'))
                    ->date()
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->label(__('filament.fields.updated_at'))
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->groupedBulkActions([
                DeleteBulkAction::make(),
            ]);
    }


    public static function getFormFieldSchema(): array
    {
        return [
            Grid::make()
                ->schema([
                    TextInput::make('title')
                        ->label(__('filament.fields.title'))
                        ->required()
                        ->maxValue(50)
                        ->afterStateUpdated(function ($state, Set $set, Get $get) {
                            $currentSlug = $get('slug');
                            if (empty($currentSlug)) {
                                $set('slug', Str::slug($state));
                            }
                        })
                        ->live(onBlur: true),
                    TextInput::make('slug')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn($state, Set $set) => $set('slug', Str::slug($state)))
                        ->unique(Category::class, 'slug', ignoreRecord: true)
                        ->label(__('filament.fields.slug')),
                    FileUpload::make('featured_image')
                        ->image()
                        ->directory('categories/featured_images')
                        ->required()
                        ->columnSpanFull()
                        ->label(__('filament.fields.featured_image')),
                ]),
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCategories::route('/'),
        ];
    }
}

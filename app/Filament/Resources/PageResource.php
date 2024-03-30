<?php

namespace App\Filament\Resources;

use App\Enums\DisplayStatus;
use App\Filament\Forms\Components\SeoExtended;
use App\Filament\Resources\PageResource\Pages;
use App\Models\Category;
use App\Models\Page;
use App\Models\Service;
use Filament\Actions\Action;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\File;
use Filament\Forms\Components;
use Illuminate\Support\Str;


class PageResource extends Resource
{
    use Translatable;

    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    protected static ?string $recordTitleAttribute = 'title';


    public static function getNavigationLabel(): string
    {
        return __('filament.pages.title');
    }

    public static function getLabel(): ?string
    {
        return __('filament.pages.title');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema(static::getFormFieldsSchema())
                    ->columnSpan(['lg' => 2]),
                Group::make()
                    ->schema([
                        Section::make()
                            ->schema([
                                Select::make('status')
                                    ->label(__('filament.fields.status'))
                                    ->options(DisplayStatus::class)
                                    ->default(DisplayStatus::PUBLISHED)
                                    ->required(),

                                Select::make('template')
                                    ->label(__('filament.fields.template'))
                                    ->options(static::getTemplateOptions())
                                    ->default('Default')
                                    ->required(),
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
                ImageColumn::make('featured_image')
                    ->width('100px')
                    ->label(__('filament.fields.featured_image')),
                TextColumn::make('title')
                    ->label(__('filament.fields.title')),
                TextColumn::make('slug')
                    ->label(__('filament.fields.slug')),
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
            ->headerActions([
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getFormFieldsSchema(): array
    {
        return [
            Tabs::make('Tabs')
                ->columnSpanFull()
                ->tabs([
                    Tab::make('General')
                        ->schema([
                            TextInput::make('title')
                                ->label(__('filament.fields.title'))
                                ->required()
                                ->live(onBlur: true)
                                ->afterStateUpdated(function ($state, Set $set, Get $get) {
                                    $currentSlug = $get('slug');

                                    if (empty($currentSlug)) {
                                        $set('slug', Str::slug($state));
                                    }
                                })
                            ,
                            TextInput::make('slug')
                                ->required()
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn($state, Set $set) => $set('slug', Str::slug($state)))
                                ->unique(Page::class, 'slug', ignoreRecord: true)
                                ->label(__('filament.fields.slug'))
                            ,
                            TextInput::make('excerpt')
                                ->label(__('filament.fields.excerpt'))
                                ->required()
                                ->columnSpanFull()
                                ->maxLength(150),
                            FileUpload::make('featured_image')
                                ->image()
                                ->directory('services/featured_images')
                                ->required()
                                ->columnSpanFull()
                                ->label(__('filament.fields.featured_image')),
                        ])->columns(),
                    Tab::make(__('filament.fields.content'))
                        ->schema(DynamicConfigResource::getBuilderFieldsSchema()),
                ]),
        ];
    }


    private static function getTemplateOptions(): array
    {
        $templatePath = resource_path('views/pages/templates');
        $files = File::files($templatePath);
        $templates = [];

        foreach ($files as $file) {
            $filename = ucfirst(explode('.', pathinfo($file, PATHINFO_FILENAME))[0]);
            $templates[$filename] = $filename;
        }

        return $templates;
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}

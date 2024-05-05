<?php

namespace App\Filament\Resources;

use App\Enums\ConfigDataType;
use App\Filament\Resources\DynamicConfigResource\Pages;
use App\Models\Category;
use App\Models\DynamicConfig;
use App\Models\Page;
use App\Models\Post;
use App\Models\Service;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Table;
use Filament\Tables;
use Illuminate\Support\Str;

class DynamicConfigResource extends Resource
{
    use Translatable;

    protected static ?string $model = DynamicConfig::class;

    protected static ?string $modelLabel = 'configuration';


    protected static ?string $navigationIcon = 'heroicon-o-wrench';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        TextInput::make('title')
                            ->label(__('filament.fields.title'))
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(function ($state, Set $set, Get $get) {
                                $currentSlug = $get('key');
                                if (empty($currentSlug)) {
                                    $set('key', Str::snake($state));
                                }
                            }),
                        TextInput::make('key')
                            ->afterStateUpdated(fn($state, Set $set) => $set('key', Str::snake($state)))
                            ->unique(DynamicConfig::class, 'key', ignoreRecord: true)
                            ->label(__('filament.fields.key'))
                            ->required(),
                        Select::make('type')
                            ->label(__('filament.fields.type'))
                            ->options(ConfigDataType::class)
                            ->default(ConfigDataType::BUILDER)
                            ->selectablePlaceholder(false)
                            ->required()
                            ->live()
                            ->afterStateUpdated(fn(Select $component) => $component
                                ->getContainer()
                                ->getComponent('dynamicTypeFields')
                                ->getChildComponentContainer()
                                ->fill()),
                        Section::make(2)::make(__('filament.fields.content'))
                            ->schema(fn(Get $get): array => match (ConfigDataType::parse($get('type'))) {
                                ConfigDataType::INT => [
                                    TextInput::make('content')
                                        ->label(__('filament.fields.int'))
                                        ->numeric()
                                        ->required(),
                                ],
                                ConfigDataType::STRING => [
                                    TextInput::make('content')
                                        ->label(__('filament.fields.string'))
                                        ->required(),
                                ],
                                ConfigDataType::IMAGE => [
                                    FileUpload::make('content')
                                        ->image()
                                        ->directory('configs')
                                        ->required()
                                        ->columnSpanFull()
                                        ->label(__('filament.fields.image')),
                                ],
                                ConfigDataType::BUILDER => static::getBuilderFieldsSchema(),
                                default => [],
                            })
                            ->key('dynamicTypeFields')
                    ])->columns(3),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label(__('filament.fields.title')),
                TextColumn::make('key')
                    ->label(__('filament.fields.key')),

                TextColumn::make('type')
                    ->label(__('filament.fields.type')),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->groupedBulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }


    public static function getBuilderFieldsSchema(): array
    {
        return [
            Builder::make('content')
                ->label(__('filament.fields.builder'))
                ->columnSpanFull()
                ->collapsible()
                ->cloneable()
                ->collapsed()
                ->addActionLabel(__('filament.fields.add_content'))
                ->blocks(static::getBlocks())
        ];
    }


    public static function getBlocks(): array
    {
        return [
            Block::make('section')->schema(static::getBlockSchemaSection()),
//            Block::make('button')->schema(static::getBlockSchemaButton()),
//            Block::make('accordions')->schema(static::getBlockSchemaAccordions()),
//            Block::make('hero')->schema(static::getBlockSchemaHero()),
//            Block::make('paragraph')->schema(static::getBlockSchemaParagraph()),
            Block::make('text')->schema(static::getBlockSchemaText()),
        ];
    }

    public static function getBlockSchemaText(): array
    {
        return [
            Group::make()
                ->schema([
                    Select::make('alignment')
                        ->options([
                            'left' => 'Left',
                            'center' => 'Center',
                            'right' => 'Right',
                        ])
                        ->default('center')
                        ->required(),
                    Select::make('level')
                        ->options([
                            'p' => 'Paragraph',
                            'h1' => 'H1',
                            'h2' => 'H2',
                            'h3' => 'H3',
                            'h4' => 'H4',
                            'h5' => 'H5',
                            'h6' => 'H6',
                        ])
                        ->default('p')
                        ->required(),
                    Textarea::make('content')
                        ->label('Contenu')
                        ->required()
                        ->default('Lorem ipsum dolor sit amet, consectetur adipiscing elit.')
                        ->rows(3)
                        ->columnSpanFull(),
                ])
                ->columnSpanFull()
                ->columns()
        ];
    }

    public static function getBlockSchemaSection(): array
    {
        return [
            TextInput::make('subtitle')
                ->label(__('filament.fields.subtitle')),
            TextInput::make('section_number')
                ->label(__('filament.fields.section_number')),
            TextInput::make('title')
                ->label(__('filament.fields.title'))
                ->required(),
            Section::make('content')
                ->schema([
                    Builder::make('content')
                        ->label('')
                        ->columnSpanFull()
                        ->blocks([
                            Block::make('richEditor')->schema(static::getBlockSchemaRichEditor()),
                        ])
                        ->addActionLabel(__('filament.fields.add_content'))

                ])
                ->columnSpanFull(),
//            Section::make('title')
//                ->collapsible()
//                ->schema(static::getBlockSchemaHeading())
//                ->columnSpanFull(),
//            Textarea::make('content')
//                ->label('Paragraph')
//                ->rows(5)
//                ->required(),
//            TextInput::make('link')
//                ->label('Lien du bouton')
//                ->live()
//                ->required(),
//            FileUpload::make('image')
//                ->label('Image')
//                ->optimize('webp')
//                ->image()
//                ->required(),
        ];
    }

    public static function getBlockSchemaButton(): array
    {

        $services = Service::all()->map(function ($service) {
            return [
                'name' => $service->title,
                'value' => $service->slug
            ];
        })->toArray();

        return [
            Select::make('type')
                ->label('Type')
                ->options([
                    'service' => 'Service',
                    'page' => 'Page',
                    'post' => 'Post',
                ])
                ->default('service')
                ->live()
                ->required(),
            Select::make('sub_category')
                ->label('Sous-catégorie')
                ->options(fn(Get $get): array => match ($get('type')) {
                    'service' => $services,
                    'page' => Page::all()->pluck('title', 'slug')->toArray(),
                    'post' => Post::all()->pluck('title', 'slug')->toArray(),
                    default => [],
                }),

            TextInput::make('link')
                ->label('Lien du bouton')
                ->live()
                ->required(),
            FileUpload::make('image')
                ->label('Image')
                ->optimize('webp')
                ->image()
                ->required(),
        ];
    }

    public static function getBlockSchemaAccordions(): array
    {
        return [
            Repeater::make('accordion')
                ->label('Accordion')
                ->collapsible()
                ->reorderableWithButtons()
                ->itemLabel(fn($state) => $state['title'] ?? 'Accordion')
                ->collapsed()
                ->schema([
                    TextInput::make('title')
                        ->label('Title')
                        ->live()
                        ->required(),
                    RichEditor::make('content')
                        ->label('Content')
                        ->required(),
                ])
                ->required(),
        ];
    }

    public static function getBlockSchemaHero(): array
    {
        return [
            Section::make('title')
                ->collapsible()
                ->schema(static::getBlockSchemaText())
                ->columnSpanFull(),
            Textarea::make('content')
                ->label('Paragraph')
                ->rows(5)
                ->required(),
            TextInput::make('link')
                ->label('Lien du bouton')
                ->live()
                ->required(),
            FileUpload::make('image')
                ->label('Image')
                ->optimize('webp')
                ->image()
                ->required(),
        ];
    }

    public static function getBlockSchemaParagraph(): array
    {
        return [
            RichEditor::make('content')
                ->label('Paragraph')
                ->required(),
        ];
    }

    public static function getBlockSchemaRichEditor(): array
    {
        return [
            RichEditor::make('content')
                ->label('Contenu')
                ->required()
                ->columnSpanFull(),
        ];
    }


    public static function getRelations(): array
    {
        return [

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDynamicConfigs::route('/'),
            'create' => Pages\CreateDynamicConfig::route('/create'),
            'edit' => Pages\EditDynamicConfig::route('/{record}/edit'),
        ];
    }
}

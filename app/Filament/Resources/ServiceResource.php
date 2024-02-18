<?php

namespace App\Filament\Resources;

use App\Filament\Forms\Components\SeoExtended;
use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Page;
use App\Models\Service;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;


class ServiceResource extends Resource
{
    use Translatable;

    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationLabel(): string
    {
        return __('filament.services.title');
    }

    public static function getLabel(): ?string
    {
        return __('filament.services.title');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('filament.navigation.groups.general');
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
                        Section::make(__('filament.categories.fields.featured_image'))
                            ->schema([
                                FileUpload::make('featured_image')
                                    ->image()
                                    ->directory('services/featured_images')
                                    ->required()
                                    ->label(__('filament.categories.fields.featured_image')),
                            ]),
                        Section::make('Associations')
                            ->schema([
                                Select::make('categories')
                                    ->relationship('categories', 'title')
                                    ->getOptionLabelFromRecordUsing(fn($record) => $record->title)
                                    ->preload()
                                    ->multiple()
                                    ->createOptionForm([
                                        TextInput::make('title')
                                            ->label(__('filament.categories.fields.title'))
                                            ->required()
                                            ->maxValue(50),
                                    ])
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
                    ->label(__('filament.services.fields.featured_image')),
                TextColumn::make('title')
                    ->label(__('filament.services.fields.title')),
                TextColumn::make('slug')
                    ->label(__('filament.services.fields.slug')),
                TextColumn::make('created_at')
                    ->label(__('filament.services.fields.created_at'))
                    ->date()
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->label(__('filament.services.fields.updated_at'))
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
                ->tabs([
                    Tab::make('General')
                        ->schema([
                            TextInput::make('title')
                                ->label(__('filament.services.fields.title'))
                                ->required()
                                ->live(onBlur: true)
                            ->columnSpanFull(),
                            TextInput::make('slug')
                                ->required()
                                ->prefix(fn($livewire) => ENV('APP_URL') . '/' . $livewire->activeLocale . '/')
                                ->label(__('filament.services.fields.slug'))
                                ->hidden(fn(?Service $record) => $record === null)
                                ->columnSpanFull(),
                            Fieldset::make(__('filament.services.fields.content'))
                                ->schema(static::getBuilderFieldsSchema())
                        ])->columns(),
                    Tab::make('SEO')
                        ->schema([
                            SeoExtended::make()
                                ->columns(3)
                        ]),
                ]),

        ];
    }

    public static function getBuilderFieldsSchema(): array
    {
        return [
            Builder::make('content')
                ->label('')
                ->columnSpanFull()
                ->addActionLabel(__('filament.services.fields.add_content'))
                ->blocks([
                    Block::make('heading')
                        ->schema([
                            Group::make()
                                ->schema([
                                    TextInput::make('content')
                                        ->label('Heading')
                                        ->required(),
                                    Select::make('alignment')
                                        ->options([
                                            'left' => 'Left',
                                            'center' => 'Center',
                                            'right' => 'Right',
                                        ])
                                        ->default('left')
                                        ->required(),
                                    Select::make('level')
                                        ->options([
                                            'h1' => 'Heading 1',
                                            'h2' => 'Heading 2',
                                            'h3' => 'Heading 3',
                                            'h4' => 'Heading 4',
                                            'h5' => 'Heading 5',
                                            'h6' => 'Heading 6',
                                        ])
                                        ->required(),
                                ])
                                ->columns(3)

                        ])
                    ,
                    Block::make('paragraph')
                        ->schema([
                            RichEditor::make('content')
                                ->label('Paragraph')
                                ->required(),
                        ]),
                    Block::make('hero')
                        ->schema([
                            RichEditor::make('content')
                                ->label('Paragraph')
                                ->required(),
                            TextInput::make('link')
                                ->label('Lien du bouton')
                                ->live()
                                ->required(),


                        ]),
                    Block::make('accordions')
                        ->schema([
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
                        ]),
                ])
        ];
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}

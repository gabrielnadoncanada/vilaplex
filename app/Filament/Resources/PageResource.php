<?php

namespace App\Filament\Resources;

use App\Enums\PageStatus;
use App\Filament\Forms\Components\SeoExtended;
use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Actions\Action;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Fieldset;
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
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\File;
use Filament\Forms\Components;


class PageResource extends Resource
{
    use Translatable;

    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationLabel(): string
    {
        return __('filament.pages.title');
    }

    public static function getLabel(): ?string
    {
        return __('filament.pages.title');
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
                        Section::make()
                            ->schema([
                                Select::make('status')
                                    ->label(__('filament.pages.fields.status'))
                                    ->options(PageStatus::class)
                                    ->default(PageStatus::PUBLISHED)
                                    ->required(),

                                Select::make('template')
                                    ->label(__('filament.pages.fields.template'))
                                    ->options(static::getTemplateOptions())
                                    ->default('Default')
                                    ->required(),
                            ]),
                        Section::make()
                            ->schema([
                                Group::make()
                                    ->schema([
                                        Placeholder::make('created_at')
                                            ->label('Date de création')
                                            ->content(fn(Page $record): ?string => $record->created_at?->diffForHumans()),
                                        Placeholder::make('updated_at')
                                            ->label('Date de modification')
                                            ->content(fn(Page $record): ?string => $record->updated_at?->diffForHumans()),
                                    ])->hidden(fn(?Page $record) => $record === null)
                            ])
                    ])
                    ->columnSpan(['lg' => 1]),

            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label(__('filament.pages.fields.title')),
                TextColumn::make('slug')
                    ->label(__('filament.pages.fields.slug')),
                TextColumn::make('created_at')
                    ->label(__('filament.pages.fields.created_at'))
                    ->date()
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->label(__('filament.pages.fields.updated_at'))
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
                                ->label(__('filament.pages.fields.title'))
                                ->required()
                                ->live(onBlur: true)
                            ->columnSpanFull(),
                            TextInput::make('slug')
                                ->required()
                                ->prefix(fn($livewire) => ENV('APP_URL') . '/' . $livewire->activeLocale . '/')
                                ->label(__('filament.pages.fields.slug'))
                                ->hidden(fn(?Page $record) => $record === null)
                                ->columnSpanFull(),
                            Fieldset::make(__('filament.pages.fields.content'))
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
                ->addActionLabel(__('filament.pages.fields.add_content'))
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
            'view' => Pages\PreviewPage::route('/{record}/preview'),
        ];
    }
}

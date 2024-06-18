<?php

namespace App\Filament\Resources;

use App\Enums\PublishedStatus;
use App\Filament\Fields\TitleWithSlugInput;
use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PostTypeResource\Pages\ManageCategories;
use App\Models\Page;
use App\Traits\HasTemplates;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Pboivin\FilamentPeek\Tables\Actions\ListPreviewAction;

class PageResource extends Resource
{
    use HasTemplates;

    protected static ?string $model = Page::class;

    protected static ?string $navigationGroup = 'Site';
    protected static ?int $navigationSort = 1;


    protected static bool $shouldRegisterNavigation = true;

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('General')
                    ->schema(self::getGeneralSchema())
                    ->collapsible(),
                ...self::getTemplateSchemas(),
            ]);
    }

    protected static function getGeneralSchema(): array
    {
        return [
            TitleWithSlugInput::make(
                fieldTitle: 'title',
                fieldSlug: 'slug',
            )->label('Title'),
            Textarea::make('description')
                ->required(),
            Select::make('status')
                ->label(__('status'))
                ->options(PublishedStatus::class)
                ->default(PublishedStatus::PUBLISHED)
                ->required(),
            self::templatesField(),
            FileUpload::make('image')
                ->label('Image')
                ->image(),
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Image'),
                TextColumn::make('title'),
                TextColumn::make('slug'),
                TextColumn::make('status')
                    ->badge(),
            ])
            ->filters([])
            ->actions([
                ActionGroup::make([
                    ListPreviewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->groupedBulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);

    }

    public static function getRelations(): array
    {
        return [
            // Define your relations here
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

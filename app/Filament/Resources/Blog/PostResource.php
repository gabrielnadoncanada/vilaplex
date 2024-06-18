<?php

namespace App\Filament\Resources\Blog;

use App\Enums\PublishedStatus;
use App\Filament\Fields\TitleWithSlugInput;
use App\Filament\Resources\Blog\PostResource\Pages;
use App\Models\Blog\Post;
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

class PostResource extends Resource
{
    use HasTemplates;

    protected static ?string $model = Post::class;

    protected static ?string $slug = 'blog/posts';

    protected static ?string $navigationGroup = 'Blog';


    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function getTemplateModel(): string
    {
        return 'App\Models\BlogPost';
    }


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
            )
                ->label('Title'),
            Textarea::make('description')
                ->required(),
            Select::make('status')
                ->label(__('status'))
                ->options(PublishedStatus::class)
                ->default(PublishedStatus::PUBLISHED)
                ->required(),
            self::templatesField(),
            Select::make('categories')
                ->multiple()
                ->relationship('categories', 'title')
                ->searchable()
                ->preload()
                ->createOptionForm(CategoryResource::getGeneralSchema()),
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
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}

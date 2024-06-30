<?php

namespace App\Filament\Resources;

use App\Filament\Blocks\Slider;
use App\Filament\Fields\ExtendedBuilder;
use App\Filament\Fields\Meta;
use App\Filament\Fields\TitleWithSlugInput;
use App\Filament\Resources\FormResource\Pages;
use App\Models\Form;
use App\Traits\HasMeta;
use Filament\Forms;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Form as FilamentForm;

class FormResource extends Resource
{
    protected static ?string $model = Form::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(FilamentForm $form): FilamentForm
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('title')
                    ->required()
                    ->label('Form Title'),
                Forms\Components\Textarea::make('description')
                    ->label('Form Description'),
                Section::make('Form Fields')
                    ->schema([
                        ExtendedBuilder::make('fields')
                            ->blockPickerColumns(2)
                            ->relationship('fields')
                            ->blocks([
                                Block::make('text_input')
                                    ->label('Text Input')
                                    ->schema([
                                        Forms\Components\Fieldset::make('settings')
                                            ->label('Settings')
                                            ->schema([
                                                Forms\Components\TextInput::make('label')
                                                    ->required(),
                                            ])
                                    ]),
//                                Block::make('textarea')
//                                    ->label('Textarea')
//                                    ->schema([
//                                        Forms\Components\TextInput::make('label')
//                                            ->required(),
//                                        Forms\Components\Textarea::make('settings')
//                                            ->default('{}')
//                                            ->json(),
//                                    ]),
//                                Block::make('select')
//                                    ->label('Select')
//                                    ->schema([
//                                        Forms\Components\TextInput::make('label')
//                                            ->required(),
//                                        Forms\Components\Textarea::make('settings')
//                                            ->default('{}')
//                                            ->json(),
//                                    ]),
//                                Block::make('checkbox')
//                                    ->label('Checkbox')
//                                    ->schema([
//                                        Forms\Components\TextInput::make('label')
//                                            ->required(),
//                                        Forms\Components\Textarea::make('settings')
//                                            ->default('{}')
//                                            ->json(),
//                                    ]),
//                                Block::make('toggle')
//                                    ->label('Toggle')
//                                    ->schema([
//                                        Forms\Components\TextInput::make('label')
//                                            ->required(),
//                                        Forms\Components\Textarea::make('settings')
//                                            ->default('{}')
//                                            ->json(),
//                                    ]),
//                                Block::make('checkbox_list')
//                                    ->label('Checkbox List')
//                                    ->schema([
//                                        Forms\Components\TextInput::make('label')
//                                            ->required(),
//                                        Forms\Components\Textarea::make('settings')
//                                            ->default('{}')
//                                            ->json(),
//                                    ]),
//                                Block::make('radio')
//                                    ->label('Radio')
//                                    ->schema([
//                                        Forms\Components\TextInput::make('label')
//                                            ->required(),
//                                        Forms\Components\Textarea::make('settings')
//                                            ->default('{}')
//                                            ->json(),
//                                    ]),
//                                Block::make('date_time_picker')
//                                    ->label('Date-time Picker')
//                                    ->schema([
//                                        Forms\Components\TextInput::make('label')
//                                            ->required(),
//                                        Forms\Components\Textarea::make('settings')
//                                            ->default('{}')
//                                            ->json(),
//                                    ]),
//                                Block::make('file_upload')
//                                    ->label('File Upload')
//                                    ->schema([
//                                        Forms\Components\TextInput::make('label')
//                                            ->required(),
//                                        Forms\Components\Textarea::make('settings')
//                                            ->default('{}')
//                                            ->json(),
//                                    ]),
//                                Block::make('rich_editor')
//                                    ->label('Rich Editor')
//                                    ->schema([
//                                        Forms\Components\TextInput::make('label')
//                                            ->required(),
//                                        Forms\Components\Textarea::make('settings')
//                                            ->default('{}')
//                                            ->json(),
//                                    ]),
//                                Block::make('markdown_editor')
//                                    ->label('Markdown Editor')
//                                    ->schema([
//                                        Forms\Components\TextInput::make('label')
//                                            ->required(),
//                                        Forms\Components\Textarea::make('settings')
//                                            ->default('{}')
//                                            ->json(),
//                                    ]),
//                                Block::make('repeater')
//                                    ->label('Repeater')
//                                    ->schema([
//                                        Forms\Components\TextInput::make('label')
//                                            ->required(),
//                                        Forms\Components\Textarea::make('settings')
//                                            ->default('{}')
//                                            ->json(),
//                                    ]),
//
//                                Block::make('tags_input')
//                                    ->label('Tags Input')
//                                    ->schema([
//                                        Forms\Components\TextInput::make('label')
//                                            ->required(),
//                                        Forms\Components\Textarea::make('settings')
//                                            ->default('{}')
//                                            ->json(),
//                                    ]),

//                                Block::make('key_value')
//                                    ->label('Key-value')
//                                    ->schema([
//                                        Forms\Components\TextInput::make('label')
//                                            ->required(),
//                                        Forms\Components\Textarea::make('settings')
//                                            ->default('{}')
//                                            ->json(),
//                                    ]),
//                                Block::make('color_picker')
//                                    ->label('Color Picker')
//                                    ->schema([
//                                        Forms\Components\TextInput::make('label')
//                                            ->required(),
//                                        Forms\Components\Textarea::make('settings')
//                                            ->default('{}')
//                                            ->json(),
//                                    ]),
//                                Block::make('toggle_buttons')
//                                    ->label('Toggle Buttons')
//                                    ->schema([
//                                        Forms\Components\TextInput::make('label')
//                                            ->required(),
//                                        Forms\Components\Textarea::make('settings')
//                                            ->default('{}')
//                                            ->json(),
//                                    ]),
                            ]),

                    ]),
            ])->columns(1);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListForms::route('/'),
            'create' => Pages\CreateForm::route('/create'),
            'edit' => Pages\EditForm::route('/{record}/edit'),
        ];
    }
}

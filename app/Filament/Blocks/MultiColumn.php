<?php

namespace App\Filament\Blocks;

use App\Filament\Fields\UrlSelectionField;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

class MultiColumn
{
    public static function make(
        string $name = 'multicolumn',
        string $context = 'form',
    ): Block
    {
        return Block::make($name)
            ->schema([
                TextInput::make('columns_desktop')
                    ->label('Columns on Desktop')
                    ->numeric()
                    ->default(3)
                    ->minValue(1)
                    ->maxValue(6),
                Select::make('column_alignment')
                    ->label('Column Alignment')
                    ->options([
                        'left' => 'Left',
                        'center' => 'Center',
                    ])
                    ->default('left'),
                Select::make('columns_mobile')
                    ->label('Columns on Mobile')
                    ->options([
                        '1' => '1',
                        '2' => '2',
                    ])
                    ->default('1'),
                Toggle::make('swipe_on_mobile')
                    ->label('Swipe on Mobile')
                    ->default(false),
                Repeater::make('blocks')
                    ->label('Blocks')
                    ->schema([
                        TextInput::make('subtitle'),
                        Textarea::make('title')->required(),
                        Select::make('heading_level')
                            ->label('Heading Level')
                            ->options([
                                'h4' => 'Small',
                                'h3' => 'Medium',
                                'h2' => 'Large',
                                'h1' => 'Extra Large',
                            ])
                            ->default('medium'),
                        RichEditor::make('text'),
                        Fieldset::make('primary action')
                            ->schema([
                                UrlSelectionField::make('primary_action')
                                    ->columnSpanFull(),
                            ]),
                        Fieldset::make('secondary action')
                            ->schema([
                                UrlSelectionField::make('secondary_action')
                                    ->columnSpanFull(),
                            ]),
                    ])
                    ->collapsible(),
            ]);
    }
}

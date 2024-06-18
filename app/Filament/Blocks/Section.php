<?php

namespace App\Filament\Blocks;

use App\Filament\Fields\UrlSelectionField;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class Section
{
    public static function make(
        string $name = 'section',
        string $context = 'form',
    ): Block {
        return Block::make($name)
            ->schema([
                TextInput::make('section_number'),
                TextInput::make('subtitle'),
                Textarea::make('title'),
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

                Builder::make('blocks')
                    ->blocks([
                        MultiColumn::make(),
                    ])
                    ->addActionLabel('Add block')
                    ->collapsible(),
            ]);
    }
}

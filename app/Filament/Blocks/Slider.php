<?php

namespace App\Filament\Blocks;

use App\Filament\Fields\UrlSelectionField;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

class Slider
{
    public static function make(
        string $name = 'slider',
        string $context = 'form',
    ): Block {
        return Block::make($name)
            ->schema([
                Tabs::make()->tabs([
                    Tabs\Tab::make('Slides')
                        ->schema([
                            Repeater::make('slides')
                                ->label('Slides')
                                ->collapsible()
                                ->cloneable()
                                ->collapsed()
                                ->addActionLabel('Add Slide')
                                ->reorderableWithButtons()
                                ->columnSpanFull()
                                ->schema([
                                    TextInput::make('subtitle'),
                                    Textarea::make('title'),
                                    RichEditor::make('description'),
                                    FileUpload::make('image')->image(),
                                    Fieldset::make('primary action')
                                        ->schema([
                                            UrlSelectionField::make('primary_action')
                                                ->columnSpanFull(),
                                        ]),
                                    Fieldset::make('secondary action')
                                        ->schema([
                                            UrlSelectionField::make('secondary_action')
                                                ->columnSpanFull(),
                                        ])
                                        ->columnSpanFull(),
                                ]),
                        ]),
                    Tabs\Tab::make('Configuration')
                        ->schema([
                            Toggle::make('pagination')
                                ->label('Activate Pagination')
                                ->default(true),
                            Toggle::make('navigation')
                                ->label('Activate Navigation')
                                ->default(true),
                        ]),
                ]),
            ]);
    }
}

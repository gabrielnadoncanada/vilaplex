<?php

namespace App\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;

class Heading
{
    public static function make(
        string $name = 'heading',
        string $context = 'form',
    ): Block {
        return Block::make($name)
            ->schema([
                RichEditor::make('heading')
                    ->label('Heading')
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'link',
                        'redo',
                        'undo',
                    ]),
                Select::make('heading_level')
                    ->label('Heading Level')
                    ->options([
                        'h4' => 'Small',
                        'h3' => 'Medium',
                        'h2' => 'Large',
                        'h1' => 'Extra Large',
                    ])
                    ->default('h3'),
            ]);
    }
}

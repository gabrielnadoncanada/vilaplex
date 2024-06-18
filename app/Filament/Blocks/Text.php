<?php

namespace App\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\RichEditor;

class Text
{
    public static function make(
        string $name = 'text',
        string $context = 'form',
    ): Block {
        return Block::make($name)
            ->schema([
                RichEditor::make('content'),
            ]);
    }
}

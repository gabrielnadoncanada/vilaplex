<?php

namespace App\Filament\Blocks;

use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;

use Filament\Forms\Components\ToggleButtons;

class RichText
{
    public static function make(
        string $name = 'rich_text',
        string $context = 'form',
    ): Block
    {
        return Block::make($name)
            ->schema([
                ToggleButtons::make('content_alignment')
                    ->label('Content alignment')
                    ->options([
                        'left' => 'Left',
                        'center' => 'Center',
                        'right' => 'Right',
                    ])
                    ->inline(),
                Builder::make('content')
                    ->blocks([
                        Heading::make(),
                    ])
                    ->addActionLabel('Add block')
                    ->collapsible()
            ]);
    }
}

<?php

namespace App\Filament\Blocks\Fields;

use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;

class Subtitle
{
    public static function make(string $name = 'subtitle'): Fieldset
    {
        return Fieldset::make($name)
            ->schema([
                TextInput::make('subtitle_text')
                    ->columnSpanFull()
                    ->default('Lorem ipsum dolor sit amet.'),
                ToggleButtons::make('subtitle_level')
                    ->hidden()
                    ->options([
                        'span' => 'SPAN',
                        'h1' => 'H1',
                        'h2' => 'H2',
                        'h3' => 'H3',
                        'h4' => 'H4',
                        'h5' => 'H5',
                        'h6' => 'H6',
                    ])->inline()->default('span'),
            ])
            ->default('Lorem Ipsum Dolor Sit Amet');
    }
}

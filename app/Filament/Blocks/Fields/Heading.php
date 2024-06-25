<?php

namespace App\Filament\Blocks\Fields;

use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\ToggleButtons;

class Heading
{
    public static function make(string $name = 'heading'): Fieldset
    {
        return Fieldset::make($name)
            ->schema([
                Textarea::make('heading_text')
                    ->columnSpanFull()
                    ->default('Lorem ipsum dolor sit amet.'),
                ToggleButtons::make('heading_level')
                    ->options([
                        'h1' => 'H1',
                        'h2' => 'H2',
                        'h3' => 'H3',
                        'h4' => 'H4',
                        'h5' => 'H5',
                        'h6' => 'H6',
                    ])->inline()->default('h2'),
                ToggleButtons::make('heading_size')
                    ->label('Heading Size')
                    ->options([
                        'h4' => 'Small',
                        'h3' => 'Medium',
                        'h2' => 'Large',
                        'h1' => 'Extra Large',
                    ])
                    ->inline()->default('h2'),
            ])
            ->default('Lorem Ipsum Dolor Sit Amet');
    }
}

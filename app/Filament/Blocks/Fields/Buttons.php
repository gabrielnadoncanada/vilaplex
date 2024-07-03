<?php

namespace App\Filament\Blocks\Fields;

use App\Filament\Fields\UrlSelectionField;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\ToggleButtons;

class Buttons
{
    public static function make(string $name = 'buttons'): Repeater
    {
        return Repeater::make($name)
            ->schema([
                ToggleButtons::make('style')
                    ->options([
                        'default' => 'Default',
                        'outline' => 'Outline',
                    ])->inline()->default('default'),
                UrlSelectionField::make('action')
                    ->columnSpanFull(),
            ])
            ->default([]);
    }
}

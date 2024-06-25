<?php

namespace App\Filament\Blocks\Fields;

use Filament\Forms\Components\TextInput;

class Subtitle
{
    public static function make(string $name = 'subtitle'): TextInput
    {
        return TextInput::make($name)
            ->default('Lorem Ipsum Dolor Sit Amet');
    }
}

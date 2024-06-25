<?php

namespace App\Filament\Blocks\Fields;

use Filament\Forms\Components\FileUpload;

class Image
{
    public static function make(string $name = 'image'): FileUpload
    {
        return FileUpload::make($name)
            ->image()
            ->default('https://via.placeholder.com/150');
    }
}

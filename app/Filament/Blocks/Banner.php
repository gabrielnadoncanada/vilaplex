<?php

namespace App\Filament\Blocks;

use App\Filament\Blocks\Fields\Buttons;
use App\Filament\Blocks\Fields\Text;
use App\Filament\Blocks\Fields\Heading;
use App\Filament\Blocks\Fields\Image;
use App\Filament\Blocks\Fields\Subtitle;
use Filament\Forms\Components\Builder\Block;

class Banner
{
    public static function make(
        string $name = 'banner',
    ): Block {
        return Block::make($name)
            ->schema([
                Subtitle::make(),
                Heading::make(),
                Text::make(),
                Image::make(),
                Buttons::make(),
            ]);
    }
}

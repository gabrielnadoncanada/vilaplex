<?php

namespace App\Filament\Blocks;

use App\Filament\Blocks\Fields\Buttons;
use App\Filament\Blocks\Fields\Text;
use App\Filament\Blocks\Fields\Heading;
use App\Filament\Blocks\Fields\Image;
use App\Filament\Blocks\Fields\Subtitle;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Toggle;

class Slider
{
    public static function make(
        string $name = 'slider',
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
                                    Subtitle::make(),
                                    Heading::make(),
                                    Text::make(),
                                    Image::make(),
                                    Buttons::make(),
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

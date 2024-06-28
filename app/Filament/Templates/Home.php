<?php

namespace App\Filament\Templates;

use App\Filament\Blocks\Banner;
use App\Filament\Blocks\Section;
use App\Filament\Blocks\Slider;
use App\Filament\Blocks\Video;
use Filament\Forms\Components\Builder;
use Pboivin\FilamentPeek\Forms\Actions\InlinePreviewAction;

final class Home
{
    public static function title()
    {
        return 'Home';
    }

    public static function schema(): array
    {
        return [
            \Filament\Forms\Components\Section::make('Header')
                ->collapsible()
                ->collapsed()
                ->schema([
                    Builder::make('header_section')
                        ->blocks([
                            Slider::make()
                                ->configureField('heading_level', function ($heading) {
                                    return $heading->default('h2')->hidden();
                                })
                                ->configureField('heading_size', function ($heading) {
                                    return $heading->default('h1')->hidden();
                                })
                                ->maxItems(1),
                        ])
                        ->deletable(false),
                ]),
        ];
    }
}

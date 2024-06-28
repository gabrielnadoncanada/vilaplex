<?php

namespace App\Filament\Templates;

use App\Filament\Blocks\Banner;
use App\Filament\Blocks\Content;
use App\Filament\Blocks\Section;
use App\Filament\Blocks\Slider;
use App\Filament\Blocks\Video;
use Filament\Forms\Components\Builder;
use Pboivin\FilamentPeek\Forms\Actions\InlinePreviewAction;

final class Single
{
    public static function title()
    {
        return 'Single';
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
                            Banner::make()
                                ->configureField('heading_level', function ($heading) {
                                    return $heading->default('h1')->hidden();
                                })
                                ->configureField('heading_size', function ($heading) {
                                    return $heading->default('h1')->hidden();
                                })
                                ->maxItems(1),
                        ])
                        ->default([['type' => 'banner', 'data' => []]])
                        ->addable(false)
                        ->deletable(false),
                ]),
            \Filament\Forms\Components\Section::make('Content')
                ->collapsible()
                ->collapsed()
                ->schema([
                    Builder::make('content_section')
                        ->cloneable()
                        ->collapsible()
                        ->collapsed()
                        ->blocks([
                            Section::make(),
                            Video::make(),
                            Slider::make()
                        ]),
                ]),
            \Filament\Forms\Components\Section::make('Footer')
                ->collapsible()
                ->collapsed()
                ->schema([
                    Builder::make('footer_section')
                        ->blocks([
                            Banner::make()
                                ->configureField('subtitle_level', function ($heading) {
                                    return $heading->default('h2');
                                })
                                ->configureField('heading_level', function ($heading) {
                                    return $heading->default('h3')->hidden();
                                })
                                ->configureField('heading_size', function ($heading) {
                                    return $heading->default('h1')->hidden();
                                })
                                ->maxItems(1),
                        ])
                        ->default([['type' => 'banner', 'data' => []]]),
                ]),
        ];
    }
}

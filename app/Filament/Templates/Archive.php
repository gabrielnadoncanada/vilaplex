<?php

namespace App\Filament\Templates;

use App\Filament\Blocks\Banner;
use App\Filament\Blocks\Grid;
use App\Filament\Blocks\Section;
use App\Filament\Blocks\Video;
use Filament\Forms\Components\Builder;
use Pboivin\FilamentPeek\Forms\Actions\InlinePreviewAction;

final class Archive
{
    public static function title()
    {
        return 'Archive';
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
                            Banner::make('banner')
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
                            Grid::make(),
                            Section::make(),
                            Video::make(),
                        ]),
                ]),
            \Filament\Forms\Components\Section::make('Footer')
                ->collapsible()
                ->collapsed()
                ->schema([
                    Builder::make('footer_section')
                        ->blocks([
                            Banner::make('banner')
                                ->maxItems(1),
                        ])
                        ->default([['type' => 'banner', 'data' => []]]),
                ]),
        ];
    }
}

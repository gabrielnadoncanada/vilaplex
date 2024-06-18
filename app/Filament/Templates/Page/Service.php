<?php

namespace App\Filament\Templates\Page;

use App\Filament\Blocks\Banner;
use App\Filament\Blocks\Slider;
use App\Filament\Templates\BaseTemplate;
use Filament\Forms\Components\Builder;

final class Service  extends BaseTemplate
{

    public static function title()
    {
        return 'Service';
    }


    public static function schema(): array
    {
        return [
            self::headerSection([
                Builder::make('items')
                    ->blocks([
                        Banner::make(hasAction: false)
                            ->maxItems(1)
                    ])
                    ->default([["type" => "banner", "data" => []]])
                    ->deletable(false)
            ]),
            self::contentSection(),
            self::footerSection([
                Builder::make('items')
                    ->blocks([
                        Banner::make()
                            ->maxItems(1)
                    ])
                    ->default([["type" => "banner", "data" => []]])
            ]),
        ];
    }
}

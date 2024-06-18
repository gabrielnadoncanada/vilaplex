<?php

namespace App\Filament\Templates\Page;

use App\Filament\Blocks\Banner;
use App\Filament\Templates\BaseTemplate;
use Filament\Forms\Components\Builder;

final class Blog extends BaseTemplate
{
    public static function title()
    {
        return 'Blog';
    }

    public static function schema(): array
    {
        return [
            self::headerSection([
                Builder::make('header_section')
                    ->blocks([
                        Banner::make(hasAction: false)
                            ->maxItems(1),
                    ])
                    ->default([['type' => 'banner', 'data' => []]])
                    ->deletable(false),
            ]),
            self::contentSection(),
            self::footerSection([
                Builder::make('footer_section')
                    ->blocks([
                        Banner::make()
                            ->maxItems(1),
                    ])
                    ->default([['type' => 'banner', 'data' => []]]),
            ]),
        ];
    }
}

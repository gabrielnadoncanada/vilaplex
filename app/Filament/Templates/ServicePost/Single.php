<?php

namespace App\Filament\Templates\ServicePost;


use App\Filament\Blocks\Banner;
use App\Filament\Blocks\RichText;
use App\Filament\Blocks\Section;
use App\Filament\Templates\BaseTemplate;
use Filament\Forms\Components\Builder;

final class Single extends BaseTemplate
{

    public static function title()
    {
        return 'Default';
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
            self::contentSection([
                Builder::make('items')
                    ->blocks([
                       Section::make()
                    ])
            ]),
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

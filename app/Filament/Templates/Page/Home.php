<?php

namespace App\Filament\Templates\Page;

use App\Filament\Blocks\Slider;
use App\Filament\Templates\BaseTemplate;
use Filament\Forms\Components\Builder;

final class Home  extends BaseTemplate
{
    public string $view = 'templates.page.home';

    public static function title()
    {
        return 'Home';
    }

    public static function schema()
    {
        return [
            self::contentSection([
                Builder::make('items')
                    ->blocks([
                        Slider::make()
                            ->maxItems(1)
                    ])
                    ->deletable(false)
            ]),
        ];
    }
}

<?php

namespace App\Filament\Templates;

use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Section;
use Pboivin\FilamentPeek\Forms\Actions\InlinePreviewAction;

abstract class BaseTemplate
{
    public static function headerSection($schema = []): Section
    {
        return
            Section::make('Header')
                ->collapsible()
                ->collapsed()
                ->schema($schema);
    }

    public static function contentSection($schema = []): Section
    {
        return Section::make('Content')
            ->collapsible()
            ->collapsed()
            ->headerActions([
                InlinePreviewAction::make()
                    ->label('Open Content Editor')
                    ->builderName('content_section'),
            ])
            ->schema($schema);
    }

    public static function footerSection($schema = []): Section
    {
        return Section::make('Footer')
            ->collapsible()
            ->collapsed()
            ->schema($schema);
    }
}

<?php

namespace App\Filament\Templates;

use App\Filament\Blocks\Banner;
use App\Filament\Blocks\Slider;
use App\Filament\Fields\PageContent;
use App\Filament\Fields\UrlSelectionField;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

abstract class BaseTemplate
{
    public static function headerSection($schema = []): Section
    {
        return
            Section::make('Header')
                ->collapsible()
                ->collapsed()
                ->schema($schema)
                ->statePath('header_section');
    }

    public static function contentSection($schema = []): Section
    {
        return Section::make('Content')
            ->collapsible()
            ->collapsed()
            ->schema($schema)
            ->statePath('content_section');
    }

    public static function footerSection($schema = []): Section
    {
        return Section::make('Footer')
            ->collapsible()
            ->collapsed()
            ->schema($schema)
            ->statePath('footer_section');
    }
}

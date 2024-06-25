<?php

namespace App\Traits;

use App\Filament\Templates\Single;
use App\Models\Page;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Symfony\Component\Finder\SplFileInfo;

trait HasTemplates
{
    public static ?string $templateModel = Single::class;

    public static function getTemplateSchemas(): array
    {
        return [
            Group::make(static::$templateModel::schema())
                ->columnSpanFull()
                ->afterStateHydrated(fn($component, $state) => $component->getChildComponentContainer()->fill($state))
                ->statePath('content')
        ];
    }
}

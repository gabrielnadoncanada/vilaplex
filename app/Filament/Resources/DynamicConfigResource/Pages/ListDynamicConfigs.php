<?php

namespace App\Filament\Resources\DynamicConfigResource\Pages;

use App\Filament\Resources\DynamicConfigResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListDynamicConfigs extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = DynamicConfigResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\DynamicConfigResource\Pages;

use App\Filament\Resources\DynamicConfigResource;
use Filament\Actions;
use Filament\Pages\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Pages\EditRecord\Concerns\Translatable;

class EditDynamicConfig extends EditRecord
{
    use Translatable;

    protected static string $resource = DynamicConfigResource::class;

    protected function getActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\DynamicConfigResource\Pages;

use App\Filament\Resources\DynamicConfigResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;

class CreateDynamicConfig extends CreateRecord
{
    use Translatable;

    protected static string $resource = DynamicConfigResource::class;
}

<?php

namespace App\Filament\Resources\ServiceResource\Pages;

use App\Filament\Concerns\CreateRecord\Translatable;
use App\Filament\Resources\ServiceResource;
use Filament\Resources\Pages\CreateRecord;

class CreateService extends CreateRecord
{
    use Translatable;

    protected static string $resource = ServiceResource::class;
}

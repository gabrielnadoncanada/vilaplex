<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Concerns\CreateRecord\Translatable;
use App\Filament\Resources\PageResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePage extends CreateRecord
{
    use Translatable;

    protected static string $resource = PageResource::class;
}

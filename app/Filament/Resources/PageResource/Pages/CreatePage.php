<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use App\Traits\HasTemplates;
use Filament\Resources\Pages\CreateRecord;

class CreatePage extends CreateRecord
{
    use HasTemplates;

    protected static string $resource = PageResource::class;
}

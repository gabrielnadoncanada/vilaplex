<?php

namespace App\Filament\Resources\Service\CategoryResource\Pages;

use App\Filament\Resources\Service\CategoryResource;
use App\Traits\HasTemplates;
use Filament\Resources\Pages\CreateRecord;

class CreateCategory extends CreateRecord
{

    protected static string $resource = CategoryResource::class;
}

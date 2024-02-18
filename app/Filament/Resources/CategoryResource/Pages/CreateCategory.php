<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Concerns\CreateRecord\Translatable;
use App\Filament\Resources\CategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCategory extends CreateRecord
{
    use Translatable;

    protected static string $resource = CategoryResource::class;
}

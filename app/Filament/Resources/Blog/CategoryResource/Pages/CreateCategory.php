<?php

namespace App\Filament\Resources\Blog\CategoryResource\Pages;

use App\Filament\Resources\Blog\CategoryResource;
use App\Traits\HasTemplates;
use Filament\Resources\Pages\CreateRecord;

class CreateCategory extends CreateRecord
{

    protected static string $resource = CategoryResource::class;
}

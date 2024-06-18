<?php

namespace App\Filament\Resources\Blog\PostResource\Pages;

use App\Filament\Resources\Blog\PostResource;
use App\Traits\HasTemplates;
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    use HasTemplates;

    protected static string $resource = PostResource::class;
}

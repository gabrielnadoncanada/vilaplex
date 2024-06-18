<?php

namespace App\Filament\Resources\Service\CategoryResource\Pages;

use App\Filament\Resources\Service\CategoryResource;
use App\Traits\HasTemplates;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Pboivin\FilamentPeek\Pages\Actions\PreviewAction;

class EditCategory extends EditRecord
{

    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

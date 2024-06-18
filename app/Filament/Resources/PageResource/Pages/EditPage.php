<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use App\Models\Field;
use App\Traits\HasTemplates;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Pboivin\FilamentPeek\Pages\Actions\PreviewAction;

class EditPage extends EditRecord
{
    use HasPagePreview;
    use HasTemplates;

    protected static string $resource = PageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            PreviewAction::make()->label('Preview Changes'),
        ];
    }
}

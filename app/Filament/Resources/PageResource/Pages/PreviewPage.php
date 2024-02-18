<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use Filament\Resources\Pages\ViewRecord;

class PreviewPage extends ViewRecord
{
    protected static string $resource = PageResource::class;

    protected static string $layout = 'layouts.app';

    public function mount(int|string $record): void
    {
        parent::mount($record);
        static::$view = 'pages.templates.' . $this->record->template;
    }

    protected function getActions(): array
    {
        return [];
    }
}

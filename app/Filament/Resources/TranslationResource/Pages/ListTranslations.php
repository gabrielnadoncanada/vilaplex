<?php

namespace App\Filament\Resources\TranslationResource\Pages;

use App\Filament\Actions\SynchronizeAction;
use App\Filament\Resources\TranslationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Concerns\Translatable;

class ListTranslations extends ListRecords
{
    use Translatable;

    protected static string $resource = TranslationResource::class;

    public function synchronize(): void
    {
        SynchronizeAction::run($this);
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
            SynchronizeAction::make('synchronize')
                ->action('synchronize'),
        ];
    }
}

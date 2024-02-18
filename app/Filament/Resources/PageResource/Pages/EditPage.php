<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Concerns\EditRecord\Translatable;
use App\Filament\Resources\PageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPage extends EditRecord
{
    use Translatable;

    protected static string $resource = PageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\ViewAction::make()
                ->label(__('filament.pages.fields.preview'))
                ->icon('heroicon-o-eye')
                ->openUrlInNewTab(),
            Actions\DeleteAction::make(),

        ];
    }
}

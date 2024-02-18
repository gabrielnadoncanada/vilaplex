<?php

namespace App\Filament\Concerns\EditRecord;

use Filament\Resources\Pages\EditRecord\Concerns\Translatable as BaseTranslatable;
use Illuminate\Support\Arr;

trait Translatable
{
    use BaseTranslatable;

    use BaseTranslatable {
        BaseTranslatable::updatedActiveLocale as baseTranslatableUpdatedActiveLocale;
    }

    public function updatedActiveLocale(string $newActiveLocale): void
    {
        if (blank($this->oldActiveLocale)) {
            return;
        }

        $this->resetValidation();

        $translatableAttributes = static::getResource()::getTranslatableAttributes();

        $this->otherLocaleData[$this->oldActiveLocale] = Arr::only($this->form->getState(), $translatableAttributes);

        $this->fillFormWithDataAndCallHooks([
            ...Arr::except($this->data, $translatableAttributes),
            ...$this->otherLocaleData[$this->activeLocale] ?? [],
        ]);

        unset($this->otherLocaleData[$this->activeLocale]);
    }
}

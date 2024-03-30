<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum DisplayStatus: string implements HasLabel
{
    case DRAFT = 'draft';

    case PUBLISHED = 'published';

    public function getLabel(): string
    {
        return match ($this) {
            self::DRAFT => __('filament.displayStatus.draft'),
            self::PUBLISHED => __('filament.displayStatus.published'),
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}

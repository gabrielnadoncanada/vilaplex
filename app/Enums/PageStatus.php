<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum PageStatus: string implements HasLabel
{
    case DRAFT = 'draft';

    case PUBLISHED = 'published';

    public function getLabel(): string
    {
        return match ($this) {
            self::DRAFT => __('filament.pages.status.draft'),
            self::PUBLISHED => __('filament.pages.status.published'),
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}

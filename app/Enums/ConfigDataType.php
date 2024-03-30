<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ConfigDataType: string implements HasLabel
{
    case BUILDER = 'builder';
    case IMAGE = 'image';
    case INT = 'int';
    case STRING = 'string';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::BUILDER => 'Constructeur',
            self::IMAGE => 'Image',
            self::INT => 'Nombre',
            self::STRING => 'Texte',
        };
    }

    public static function parse(ConfigDataType | string | null $value): ?self
    {
        if ($value instanceof self) {
            return $value;
        }

        return self::tryFrom($value);
    }
}

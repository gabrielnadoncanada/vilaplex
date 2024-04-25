<?php

namespace App\Models;

use App\Enums\ConfigDataType;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Spatie\Translatable\HasTranslations;

class DynamicConfig extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $guarded = [];

    public array $translatable = ['content'];

    const KEY = 'key';
    const TITLE = 'title';

    const CONTENT = 'content';

    const TYPE = 'type';

    protected $casts = [
        self::TYPE => ConfigDataType::class,
        self::CONTENT => 'array'
    ];

    protected function content(): Attribute
    {
        return Attribute::make(
            get: fn($content) => filament()->isServing() ? $content :
                match ($this[self::TYPE]) {
                    ConfigDataType::INT => intval($content),
                    ConfigDataType::IMAGE => Storage::url($content),
                    default => $content,
                }
        );
    }

    public static function getConfig(string $key)
    {
        return self::getConfigs()[$key];
    }

    public static function getConfigs()
    {
        return self::all()->pluck(self::CONTENT, self::KEY);
    }
}

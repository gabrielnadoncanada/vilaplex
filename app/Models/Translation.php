<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Spatie\Translatable\HasTranslations;

class Translation extends Model
{
    use HasTranslations;

    protected $guarded = [];

    public $translatable = ['value'];

    protected $casts = ['value' => 'array'];

    public static function boot()
    {
        parent::boot();

        $flushGroupCache = function (self $languageLine) {
            $languageLine->flushGroupCache();
        };

        static::saved($flushGroupCache);
        static::deleted($flushGroupCache);
    }

    public static function getCacheKey(string $group, string $locale): string
    {
        return "spatie.translation-loader.{$group}.{$locale}";
    }

    public static function getTranslationsForGroup(string $locale, string $group): array
    {
        return Cache::rememberForever(static::getCacheKey($group, $locale), function () use ($group) {
            return static::query()
                ->where('group', $group)
                ->get()
                ->reduce(function ($lines, self $languageLine) use ($group) {
                    $translation = $languageLine->getTrans();
                    if ($translation !== null && $group === '*') {
                        $lines[$languageLine->key] = $translation;
                    } elseif ($translation !== null && $group !== '*') {
                        Arr::set($lines, $languageLine->key, $translation);
                    }

                    return $lines;
                }) ?? [];
        });
    }

    public function getTrans(): ?string
    {
        return $this->value;
    }

    public function flushGroupCache()
    {
        Cache::forget(static::getCacheKey($this->group, $this->getLocale()));
    }
}

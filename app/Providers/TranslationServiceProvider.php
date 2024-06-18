<?php

namespace App\Providers;

use App\Services\TranslationLoader;
use Illuminate\Translation\TranslationServiceProvider as BaseServiceProvider;
use Spatie\Translatable\HasTranslations;

class TranslationServiceProvider extends BaseServiceProvider
{
    use HasTranslations;

    protected function registerLoader()
    {
        $this->app->singleton('translation.loader', function ($app) {
            return new TranslationLoader($app['files'], $app['path.lang']);
        });
    }
}

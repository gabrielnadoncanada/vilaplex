<?php

namespace App\Filament\Fields;

use Filament\Forms\Components\Select;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Symfony\Component\Finder\SplFileInfo;

class PostTemplateSelect extends Select
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->options($this->getTemplates());
    }

    public static function getTemplateClasses(): Collection
    {
        $filesystem = app(Filesystem::class);

        return collect($filesystem->allFiles(app_path('Filament/PageTemplates')))
            ->map(function (SplFileInfo $file): string {
                return (string) Str::of('App\\Filament\\PageTemplates')
                    ->append('\\', $file->getRelativePathname())
                    ->replace(['/', '.php'], ['\\', '']);
            });
    }

    public static function getTemplates(): Collection
    {
        return static::getTemplateClasses()->mapWithKeys(fn ($class) => [$class => $class::title()]);
    }
}

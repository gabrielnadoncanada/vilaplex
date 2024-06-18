<?php

namespace App\Traits;

use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Symfony\Component\Finder\SplFileInfo;

trait HasTemplates
{

    public static function templatesField(): Select
    {

        return Select::make('template')
            ->default(static::getTemplates()->keys()->first())
            ->reactive()
            ->options(static::getTemplates());
    }

    public static function getTemplates(): Collection
    {
        return static::getTemplateClasses()->mapWithKeys(fn($class) => [$class => $class::title()]);
    }

    public static function getTemplateModel(): string
    {
        return static::$model;
    }

    public static function getTemplateClasses(): Collection
    {
        $filesystem = app(Filesystem::class);

        return collect($filesystem->allFiles(app_path('Filament/Templates/' . class_basename(static::getTemplateModel()))))
            ->map(function (SplFileInfo $file): string {
                return (string)Str::of('App\\Filament\\Templates\\' . class_basename(static::getTemplateModel()))
                    ->append('\\', $file->getRelativePathname())
                    ->replace(['/', '.php'], ['\\', '']);
            });
    }

    public static function getTemplateSchemas(): array
    {
        return static::getTemplateClasses()
            ->map(
                fn($class) => Group::make($class::schema())
                    ->columnSpanFull()
                    ->afterStateHydrated(fn($component, $state) => $component->getChildComponentContainer()->fill($state))
                    ->statePath('temp_content.' . static::getTemplateName($class))
                    ->visible(fn($get) => $get('template') === $class)
            )
            ->toArray();
    }

    public static function getTemplateName($class): string
    {
        return Str::of($class)->afterLast('\\')->snake()->toString();
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['temp_content'][static::getTemplateName($data['template'])] = $data['content'];
        unset($data['content']);

        return $data;
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (array_key_exists('temp_content', $data)) {
            $data['content'] = $data['temp_content'][static::getTemplateName($data['template'])];
            unset($data['temp_content']);
        }

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (array_key_exists('temp_content', $data)) {
            $data['content'] = $data['temp_content'][static::getTemplateName($data['template'])];
            unset($data['temp_content']);
        }

        return $data;
    }
}

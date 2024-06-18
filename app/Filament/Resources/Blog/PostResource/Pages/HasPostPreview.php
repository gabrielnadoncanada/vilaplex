<?php

namespace App\Filament\Resources\Blog\PostResource\Pages;

use App\Filament\Fields\Content;
use Filament\Forms\Components\Component;
use Pboivin\FilamentPeek\Pages\Actions\PreviewAction;
use Pboivin\FilamentPeek\Pages\Concerns\HasBuilderPreview;
use Pboivin\FilamentPeek\Pages\Concerns\HasPreviewModal;

trait HasPostPreview
{
    use HasBuilderPreview;
    use HasPreviewModal;

    protected function getActions(): array
    {
        return [
            PreviewAction::make()->label('Preview Changes'),
        ];
    }

    protected function getPreviewModalView(): ?string
    {
        return 'blog.show';
    }

    protected function getBuilderPreviewView(string $builderName): ?string
    {
        return match ($builderName) {
            'content' => 'blog.show',
        };
    }

    public static function getBuilderEditorSchema(string $builderName): Component | array
    {
        return match ($builderName) {
            'content' => Content::make(
                name: 'content',
                context: 'preview',
            )->label('Content')->columnSpanFull(),
        };
    }
}

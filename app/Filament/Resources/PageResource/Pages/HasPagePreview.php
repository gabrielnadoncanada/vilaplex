<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Fields\Content;
use Filament\Forms\Components\Component;
use Pboivin\FilamentPeek\Pages\Actions\PreviewAction;
use Pboivin\FilamentPeek\Pages\Concerns\HasBuilderPreview;
use Pboivin\FilamentPeek\Pages\Concerns\HasPreviewModal;

trait HasPagePreview
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
        return 'page.show';
    }

    protected function getBuilderPreviewView(string $builderName): ?string
    {
        return match ($builderName) {
            'content' => 'page.show',
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

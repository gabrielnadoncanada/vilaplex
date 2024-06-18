<?php

namespace App\Traits;

use App\Filament\Fields\Content;
use Filament\Forms\Components\Component;
use Pboivin\FilamentPeek\Pages\Actions\PreviewAction;
use Pboivin\FilamentPeek\Pages\Concerns\HasBuilderPreview;
use Pboivin\FilamentPeek\Pages\Concerns\HasPreviewModal;

trait HasContentPreview
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
        return 'post.show';
    }

    protected function getPreviewModalDataRecordKey(): ?string
    {
        return 'post';
    }

    protected function getBuilderPreviewView(string $builderName): ?string
    {
        return match ($builderName) {
            'content_blocks' => 'post.preview-content',
            'footer_blocks' => 'post.preview-footer',
        };
    }

    public static function getBuilderEditorSchema(string $builderName): Component | array
    {
        return match ($builderName) {
            'content_blocks' => Content::make(
                name: 'content_blocks',
                context: 'preview',
            )
                ->label('Content')
                ->columnSpanFull(),
        };
    }
}

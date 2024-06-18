<?php

namespace App\Filament\Fields;

use App\Filament\Blocks\RichEditor;
use Filament\Forms\Components\Builder;

class ColumnContent
{
    public static function make(
        string $name,
        string $context = 'form',
    ): Builder {
        return Builder::make($name)
            ->blocks([
                RichEditor::make('content'),
            ])
            ->addActionLabel('Add block')
            ->collapsible();
    }
}

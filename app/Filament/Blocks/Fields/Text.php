<?php

namespace App\Filament\Blocks\Fields;

use Filament\Forms\Components\RichEditor;

class Text
{
    public static function make(string $name = 'text'): RichEditor
    {
        return RichEditor::make($name)
            ->toolbarButtons([
                'bold',
                'italic',
                'link',
                'redo',
                'undo',
            ])
            ->default('<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in dui mauris.</p>');
    }
}

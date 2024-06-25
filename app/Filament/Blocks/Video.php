<?php

namespace App\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;

class Video
{
    public static function make(
        string $name = 'video',
    ): Block {
        return Block::make($name)
            ->schema([
                TextInput::make('video_url')
                    ->label('URL de la vidéo')
                    ->placeholder('https://vimeo.com/123456789')
                    ->required(),

                FileUpload::make('preview_image')
                    ->label('Image de prévisualisation')
                    ->image()
                    ->required(),
            ]);
    }
}

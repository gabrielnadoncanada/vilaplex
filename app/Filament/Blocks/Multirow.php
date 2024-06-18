<?php

namespace App\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class Multirow
{
    public static function make(
        string $name = 'slider',
        string $context = 'form',
    ): Block {
        return Block::make($name)
            ->schema([
                Select::make('image_height')
                    ->label('Image Height')
                    ->options([
                        'adapt' => 'Adapt',
                        'small' => 'Small',
                        'medium' => 'Medium',
                        'large' => 'Large',
                    ])
                    ->default('medium'),
                Select::make('desktop_image_width')
                    ->label('Desktop Image Width')
                    ->options([
                        'small' => 'Small',
                        'medium' => 'Medium',
                        'large' => 'Large',
                    ])
                    ->default('medium')
                    ->hint('Info about desktop image width'),
                Select::make('heading_size')
                    ->label('Heading Size')
                    ->options([
                        'h2' => 'H2',
                        'h1' => 'H1',
                        'h0' => 'H0',
                    ])
                    ->default('h1'),
                Select::make('text_style')
                    ->label('Text Style')
                    ->options([
                        'body' => 'Body',
                        'subtitle' => 'Subtitle',
                    ])
                    ->default('body'),
                Select::make('button_style')
                    ->label('Button Style')
                    ->options([
                        'primary' => 'Primary',
                        'secondary' => 'Secondary',
                    ])
                    ->default('secondary'),
                Select::make('desktop_content_position')
                    ->label('Desktop Content Position')
                    ->options([
                        'top' => 'Top',
                        'middle' => 'Middle',
                        'bottom' => 'Bottom',
                    ])
                    ->default('middle')
                    ->hint('Info about desktop content position'),
                Select::make('desktop_content_alignment')
                    ->label('Desktop Content Alignment')
                    ->options([
                        'left' => 'Left',
                        'center' => 'Center',
                        'right' => 'Right',
                    ])
                    ->default('left'),
                Select::make('image_layout')
                    ->label('Image Layout')
                    ->options([
                        'alternate-left' => 'Alternate Left',
                        'alternate-right' => 'Alternate Right',
                        'align-left' => 'Align Left',
                        'align-right' => 'Align Right',
                    ])
                    ->default('alternate-left')
                    ->hint('Info about image layout'),
                TextInput::make('section_color_scheme')
                    ->label('Section Color Scheme')
                    ->default('scheme-1'),
                TextInput::make('row_color_scheme')
                    ->label('Row Color Scheme')
                    ->default('scheme-1'),
                Select::make('mobile_content_alignment')
                    ->label('Mobile Content Alignment')
                    ->options([
                        'left' => 'Left',
                        'center' => 'Center',
                        'right' => 'Right',
                    ])
                    ->default('left'),
                TextInput::make('padding_top')
                    ->label('Padding Top')
                    ->numeric()
                    ->default(36)
                    ->minValue(0)
                    ->maxValue(100)
                    ->step(4),
                TextInput::make('padding_bottom')
                    ->label('Padding Bottom')
                    ->numeric()
                    ->default(36)
                    ->minValue(0)
                    ->maxValue(100)
                    ->step(4),
                Repeater::make('blocks')
                    ->label('Blocks')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Image'),
                        TextInput::make('caption')
                            ->label('Caption')
                            ->default('Caption'),
                        TextInput::make('heading')
                            ->label('Heading')
                            ->default('Row'),
                        Textarea::make('text')
                            ->label('Text')
                            ->default('<p>Pair text with an image to focus on your chosen product, collection, or blog post. Add details on availability, style, or even provide a review.</p>'),
                        TextInput::make('button_label')
                            ->label('Button Label')
                            ->default('Button label'),
                        TextInput::make('button_link')
                            ->label('Button Link')
                            ->url(),
                    ])
                    ->collapsible(),
            ]);
    }
}

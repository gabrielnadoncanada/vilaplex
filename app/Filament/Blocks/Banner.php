<?php

namespace App\Filament\Blocks;

use App\Filament\Fields\UrlSelectionField;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class Banner
{
    public static function make(
        string $name = 'banner',
        string $context = 'form',
        bool   $hasAction = true,
    ): Block
    {
        $schema = [
            TextInput::make('subtitle'),
            Textarea::make('title')->required(),
            RichEditor::make('description'),
            FileUpload::make('image')->image(),

        ];

        if ($hasAction) {
            $schema[] =  self::primaryActionFieldset();
            $schema[] =  self::secondaryActionFieldset();
        }

        return Block::make($name)
            ->schema($schema);
    }


    public static function primaryActionFieldset(): Fieldset
    {
        return Fieldset::make('primary action')
            ->schema([
                UrlSelectionField::make('primary_action')
                    ->columnSpanFull(),
            ]);
    }

    public static function secondaryActionFieldset(): Fieldset
    {
        return Fieldset::make('secondary action')
            ->schema([
                UrlSelectionField::make('secondary_action')
                    ->columnSpanFull(),
            ]);
    }
}

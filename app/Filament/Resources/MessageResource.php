<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MessageResource\Pages;
use App\Filament\Resources\MessageResource\RelationManagers;
use App\Models\Message;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Filament\Tables\Components\Dialog;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MessageResource extends Resource
{
    protected static ?string $label = 'message';

    protected static ?string $pluralLabel = 'messages';

    protected static ?string $model = Message::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('firstName')
                ->disabled()
                ->label('Prénom'),
            Forms\Components\TextInput::make('lastName')
            ->disabled()
            ->label('Nom'),
            Forms\Components\TextInput::make('email')
                ->disabled()
                ->label('Courriel'),
            Forms\Components\TextInput::make('tel')
            ->disabled()
            ->label('Téléphone'),
            Forms\Components\Textarea::make('message')
                ->disabled()
                ->label('Message'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('firstName')
                ->label('Prénom')
                ->searchable(),
            Tables\Columns\TextColumn::make('lastName')
                 ->label('Nom')
                ->searchable(),
            Tables\Columns\TextColumn::make('email')
                ->label('Courriel')
                ->sortable(),
            Tables\Columns\TextColumn::make('tel')
                 ->label('Téléphone')
                ->searchable(),
        ])
            ->filters([
                // ... your filters
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMessages::route('/'),
            'create' => Pages\CreateMessage::route('/create'),
            'edit' => Pages\EditMessage::route('/{record}/edit'),
        ];
    }
}

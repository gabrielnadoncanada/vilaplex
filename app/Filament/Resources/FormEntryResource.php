<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactEntryResource\Pages;
use App\Models\FormEntry;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;

class FormEntryResource extends Resource
{
    protected static ?string $model = FormEntry::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'Site';

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Infolists\Components\TextEntry::make('created_at')
                ->label('Date')
                ->columnSpanFull(),

            Infolists\Components\TextEntry::make('name')
                ->columnSpanFull(),

            Infolists\Components\TextEntry::make('email')
                ->columnSpanFull(),

            Infolists\Components\TextEntry::make('message')
                ->formatStateUsing(fn ($state) => new HtmlString(nl2br($state)))
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')->sortable(),
                Tables\Columns\TextColumn::make('email')->sortable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\FormEntryResource\Pages\ListFormEntries::route('/'),
            'view' => \App\Filament\Resources\FormEntryResource\Pages\ViewFormEntry::route('/{record}'),
            // 'create' => Pages\CreateContactEntry::route('/create'),
            // 'edit' => Pages\EditContactEntry::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function getNavigationLabel(): string
    {
        return __('filament.users.title');
    }

    public static function getLabel(): ?string
    {
        return __('filament.users.title');
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema(static::getFormSchema())
                    ->columnSpan(2),
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Placeholder::make('created_at')
                            ->label(__('filament.fields.created_at'))
                            ->content(fn(User $record): ?string => $record->created_at?->diffForHumans())
                            ->hidden(fn(?User $record) => $record === null),
                        Forms\Components\Placeholder::make('updated_at')
                            ->label(__('filament.fields.updated_at'))
                            ->content(fn(User $record): ?string => $record->updated_at?->diffForHumans())
                            ->hidden(fn(?User $record) => $record === null),
                        Forms\Components\Select::make('roles')
                            ->label(__('filament.fields.roles'))
                            ->relationship('roles', 'name')
                            ->multiple()
                            ->preload()
                            ->required(),
                    ])
                    ->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('filament.fields.name')),
                Tables\Columns\TextColumn::make('email')
                    ->label(__('filament.fields.email')),
                TextColumn::make('created_at')
                    ->label(__('filament.fields.created_at'))
                    ->date()
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->label(__('filament.fields.updated_at'))
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getFormSchema(): array
    {
        return [
            Forms\Components\Section::make()
                ->schema([
                    Forms\Components\Grid::make()
                        ->schema(
                            [
                                Forms\Components\TextInput::make('name')
                                    ->label(__('filament.fields.name'))
                                    ->required(),
                                Forms\Components\TextInput::make('email')
                                    ->label(__('filament.fields.email'))
                                    ->email()
                                    ->unique(ignoreRecord: true)
                                    ->required()
                                    ->dehydrated(fn(string $operation): bool => $operation !== 'create')
                                    ->maxLength(255)
                                    ->disabled(fn(string $operation): bool => $operation !== 'create'),
                            ]
                        )->columns(2),
                ]),
            Forms\Components\Section::make('Mot de passe')
                ->collapsible()
                ->collapsed()
                ->schema([
                    Forms\Components\Grid::make()
                        ->schema([
                            Forms\Components\TextInput::make('password')
                                ->label('Nouveau mot de passe')
                                ->password()
                                ->required(fn(?User $record) => $record === null)
                                ->rule(Password::default())
                                ->dehydrated(fn($state): bool => filled($state))
                                ->live(debounce: 500)
                                ->password()
                                ->afterStateHydrated(function (Forms\Components\TextInput $component, $state) {
                                    $component->state('');
                                })
                                ->dehydrateStateUsing(fn($state) => Hash::make($state))
                                ->dehydrated(fn($state) => filled($state))
                                ->required(fn(string $context): bool => $context === 'create')
                                ->same('passwordConfirmation'),
                            Forms\Components\TextInput::make('passwordConfirmation')
                                ->label('Confirmation du mot de passe')
                                ->password()
                                ->required()
                                ->visible(fn(Get $get): bool => filled($get('password')))
                                ->dehydrated(false),
                        ])->columns(2),
                ]),
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}

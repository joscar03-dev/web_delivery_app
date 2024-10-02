<?php

namespace App\Filament\Resources;

use Althinect\FilamentSpatieRolesPermissions\Resources\RoleResource;
use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->label('Nombre')
                    ->maxLength(255),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->label('Correo Electrónico')
                    ->maxLength(255),
                TextInput::make('password')
                    ->password()
                    ->label('Contraseña')
                    ->minLength(8)
                    ->hiddenOn('edit')
                    ->required(fn($record) => $record === null),  // Solo requerido al crear
                Select::make('roles')
                    ->label('Roles')
                    ->multiple()
                    ->relationship('roles', 'name')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nombre')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Correo Electrónico')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Fecha de Creación')
                    ->date(),
                TextColumn::make('email_verified_at')
                    ->label('Correo Electrónico Verificado'),
                TextColumn::make('roles.name')
            ])
            ->filters([
                Tables\Filters\Filter::make('verified')
                    ->query(fn(Builder $query): Builder => $query->whereNotNull('email_verified_at'))

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('Verify')
                    ->label('Verificar')
                    ->Icon('heroicon-m-check-badge')
                    ->action(function (User $user) {
                        $user->email_verified_at = date('Y-m-d H:i:s');
                        $user->save();
                    }),
                Tables\Actions\Action::make('Unverify')
                    ->label('Desverificar')
                    ->Icon('heroicon-m-x-circle')
                    ->action(function (User $user) {
                        $user->email_verified_at = null;
                        $user->save();
                    }),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageUsers::route('/'),
        ];
    }
}

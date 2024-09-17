<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NegocioResource\Pages;
use App\Filament\Resources\NegocioResource\RelationManagers;
use App\Models\Negocio;
use Filament\Forms\Components\FileUpload;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NegocioResource extends Resource
{
    protected static ?string $model = Negocio::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID')->sortable(),
                TextColumn::make('nombre')->label('Nombre del Negocio')->sortable()->searchable(),
                TextColumn::make('telefono')->label('Teléfono'),
                TextColumn::make('email')->label('Email'),
                TextColumn::make('estado')
                    ->label('Estado')
                    ->formatStateUsing(function ($record) {
                        return $record->estado; // Usamos el accesor dinámico
                    })
                    ->badge()
                    ->color(function ($record) {
                        return $record->estado === 'Abierto' ? 'success' : 'danger'; // Color verde para abierto, rojo para cerrado
                    }),

            ])
            ->filters([
                // Agregar filtros si es necesario
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nombre')
                    ->label('Nombre del Negocio')
                    ->required()
                    ->maxLength(255),
                TextInput::make('direccion')
                    ->label('Dirección del Negocio')
                    ->required(),
                TextInput::make('telefono')
                    ->label('Teléfono del Negocio')
                    ->required()
                    ->maxLength(15),
                TextInput::make('email')
                    ->label('Email del Negocio')
                    ->email()
                    ->required(),
                Select::make('tipo_negocio_id')
                    ->relationship('tipoNegocio', 'nombre'),
                TextInput::make('horario_atencion')
                    ->label('Horario de Atención'),
                // ->required(),
                FileUpload::make('imagen')->image(),
                TimePicker::make('hora_apertura')
                    ->label('Hora de Apertura')
                    ->required()
                    ->placeholder('Seleccione la hora de apertura'),

                TimePicker::make('hora_cierre')
                    ->label('Hora de Cierre')
                    ->required()
                    ->placeholder('Seleccione la hora de cierre'),
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
            'index' => Pages\ListNegocios::route('/'),
            'create' => Pages\CreateNegocio::route('/create'),
            'edit' => Pages\EditNegocio::route('/{record}/edit'),
        ];
    }
}
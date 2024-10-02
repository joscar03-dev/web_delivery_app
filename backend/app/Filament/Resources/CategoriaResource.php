<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoriaResource\Pages;
use App\Filament\Resources\CategoriaResource\RelationManagers;
use App\Models\Categoria;
use App\Models\Negocio;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoriaResource extends Resource
{
    protected static ?string $model = Categoria::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nombre')->required(),
                Select::make('negocio_id')
                    ->relationship('negocio', 'nombre')
                    ->searchable()
                    ->required()
                    ->createOptionForm([
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
                            ->relationship('tipoNegocio', 'nombre')
                            ->required(),
                        TimePicker::make('hora_apertura')
                            ->label('Hora de Apertura')
                            ->required(),
                        TimePicker::make('hora_cierre')
                            ->label('Hora de Cierre')
                            ->required(),
                        FileUpload::make('imagen')->image(),
                    ])
                    ->editOptionForm([
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
                            ->relationship('tipoNegocio', 'nombre')
                            ->required(),
                        TimePicker::make('hora_apertura')
                            ->label('Hora de Apertura')
                            ->required(),
                        TimePicker::make('hora_cierre')
                            ->label('Hora de Cierre')
                            ->required(),
                        FileUpload::make('imagen')->image(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID')->sortable(),
                TextColumn::make('nombre')->sortable()->searchable(),
                TextColumn::make('negocio.nombre')->sortable()->searchable()
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageCategorias::route('/'),
        ];
    }
}

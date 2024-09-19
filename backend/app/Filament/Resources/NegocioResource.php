<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NegocioResource\Pages;
use App\Filament\Resources\NegocioResource\RelationManagers;
use App\Models\Negocio;
use Filament\Forms\Components\FileUpload;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
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
                // Sección 1: Crear el negocio
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
                FileUpload::make('imagen')->image(),
                TimePicker::make('hora_apertura')
                    ->label('Hora de Apertura')
                    ->required(),
                TimePicker::make('hora_cierre')
                    ->label('Hora de Cierre')
                    ->required(),

                // Sección de categorías (solo visible si el negocio ya está guardado)
                Forms\Components\Section::make('Categorías del Negocio')
                    ->schema([
                        Repeater::make('categorias')
                            ->relationship('categorias')
                            ->schema([
                                TextInput::make('nombre')
                                    ->label('Nombre de la Categoría')
                                    ->required(),
                            ])
                            ->minItems(1)
                            ->createItemButtonLabel('Agregar categoría'), // Volver a usar createItemButtonLabel()
                    ])
                    ->visible(fn($livewire) => $livewire->model->exists), // Solo si el negocio ya existe

                // Sección de productos (solo visible si ya existen categorías)
                Forms\Components\Section::make('Productos de Categoría')
                    ->schema([
                        Select::make('categoria_id')
                            ->label('Seleccionar Categoría')
                            ->relationship('categorias', 'nombre')
                            ->required()
                            ->afterStateUpdated(function ($state, callable $set) {
                                // Cargar productos automáticamente según la categoría seleccionada
                                $set('productos', \App\Models\Producto::where('categoria_id', $state)->get());
                            }),

                        Repeater::make('productos')
                            ->schema([
                                TextInput::make('nombre')
                                    ->label('Nombre del Producto')
                                    ->required(),
                                TextInput::make('descripcion')
                                    ->label('Descripción del Producto')
                                    ->required(),
                                TextInput::make('precio')
                                    ->label('Precio')
                                    ->required()
                                    ->numeric(),
                                FileUpload::make('imagen')->image(),
                            ])
                            ->minItems(1)
                            ->createItemButtonLabel('Agregar Producto'), // Volver a usar createItemButtonLabel()
                    ])
                    ->visible(fn($livewire) => $livewire->model->exists && \App\Models\Categoria::where('negocio_id', $livewire->model->id)->exists()),
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

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlatoResource\Pages;
use App\Filament\Resources\PlatoResource\RelationManagers;
use App\Models\Categoria;
use App\Models\Plato;
use App\Models\Producto;
use Filament\Forms;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PlatoResource extends Resource
{
    protected static ?string $model = Producto::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nombre')->required(),
                Select::make('negocio_id')
                    ->relationship('negocio', 'nombre')
                    ->required()
                    ->searchable()
                    ->reactive()  // Escucha los cambios en este campo
                    ->afterStateUpdated(function (callable $set, callable $get) {
                        // Resetea el campo de categoría si se cambia el negocio
                        $set('categoria_id', null);

                        // Verifica si el negocio tiene categorías
                        $negocioId = $get('negocio_id');
                        if ($negocioId && Categoria::where('negocio_id', $negocioId)->doesntExist()) {
                            // Lógica adicional para mostrar mensaje si no tiene categorías
                            Notification::make()
                                ->title('Este negocio no tiene categorías. Por favor crea una.')
                                ->warning()
                                ->send();
                        }
                    })
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
                Select::make('categoria_id')
                    ->relationship('categoria', 'nombre')
                    ->options(function (callable $get) {
                        $negocioId = $get('negocio_id');

                        // Si no hay un negocio seleccionado, no mostrar categorías
                        if (!$negocioId) {
                            return [];
                        }

                        // Obtener las categorías filtradas por el negocio seleccionado
                        return Categoria::where('negocio_id', $negocioId)
                            ->pluck('nombre', 'id');
                    })
                    ->required()
                    ->createOptionForm(function (callable $get) {
                        return [
                            TextInput::make('nombre')->required(),
                            // Usar el negocio seleccionado directamente
                            Hidden::make('negocio_id')->default($get('negocio_id')),
                        ];
                    }),
                TextInput::make('precio')->numeric(),
                FileUpload::make('imagen')->image(),
                Textarea::make('descripcion')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre')->sortable()->searchable(),
                TextColumn::make('precio')->sortable(),
                ImageColumn::make('imagen'),
                TextColumn::make('categoria.nombre')->label('Categoría'),
                TextColumn::make('created_at')->label('Fecha de creación')->dateTime(),
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
            'index' => Pages\ListPlatos::route('/'),
            'create' => Pages\CreatePlato::route('/create'),
            'edit' => Pages\EditPlato::route('/{record}/edit'),
        ];
    }
}

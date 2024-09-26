<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlatoResource\Pages;
use App\Filament\Resources\PlatoResource\RelationManagers;
use App\Models\Plato;
use App\Models\Producto;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
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
                Textarea::make('descripcion')->required(),
                TextInput::make('precio')->numeric()->required(),
                FileUpload::make('imagen')->image(),
                Select::make('categoria_id')
                    ->relationship('categoria', 'nombre')
                    ->required(),
                Select::make('negocio_id')
                    ->label('Negocio')
                    ->relationship('negocio', 'nombre') // Asocia el plato con un negocio
                    ->required()
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

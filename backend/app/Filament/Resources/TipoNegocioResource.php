<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TipoNegocioResource\Pages;
use App\Filament\Resources\TipoNegocioResource\RelationManagers;
use App\Models\TipoNegocio;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TipoNegocioResource extends Resource
{
    protected static ?string $model = TipoNegocio::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('nombre')
                ->label('Nombre del Tipo de Negocio')
                ->required()
                ->maxLength(255),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID')->sortable(),
                TextColumn::make('nombre')->label('Nombre del Tipo de Negocio')->sortable()->searchable(),
                TextColumn::make('created_at')->label('Creado el')->dateTime(),
                TextColumn::make('updated_at')->label('Actualizado el')->dateTime(),
            ])
            ->filters([
                Filter::make('nombre')
                    ->label('Buscar por Nombre')
                    ->query(fn ($query, $term) => $query->where('nombre', 'like', "%{$term}%")),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListTipoNegocios::route('/'),
            'create' => Pages\CreateTipoNegocio::route('/create'),
            'edit' => Pages\EditTipoNegocio::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarritoItemResource\RelationManagers\ItemsRelationManager;
use App\Filament\Resources\CarritoResource\Pages;
use App\Filament\Resources\CarritoResource\RelationManagers;
use App\Models\Carrito;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CarritoResource extends Resource
{
    protected static ?string $model = Carrito::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('usuario_id')
                    ->relationship('users', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')->label('Usuario')->sortable(),
                TextColumn::make('created_at')->label('Fecha de creación')->dateTime(),
            ])
            ->filters([
                Tables\Filters\Filter::make('Solo clientes')
                    ->query(fn(Builder $query) => $query->whereHas('user.roles', function (Builder $query) {
                        $query->where('name', 'cliente');
                    })),
            ]);
    }
    public static function getRelations(): array
    {
        return [
            ItemsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageCarritos::route('/'),
        ];
    }
}

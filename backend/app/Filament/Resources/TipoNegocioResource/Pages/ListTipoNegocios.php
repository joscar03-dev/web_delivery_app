<?php

namespace App\Filament\Resources\TipoNegocioResource\Pages;

use App\Filament\Resources\TipoNegocioResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTipoNegocios extends ListRecords
{
    protected static string $resource = TipoNegocioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

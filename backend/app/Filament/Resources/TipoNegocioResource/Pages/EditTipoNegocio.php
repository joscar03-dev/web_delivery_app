<?php

namespace App\Filament\Resources\TipoNegocioResource\Pages;

use App\Filament\Resources\TipoNegocioResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTipoNegocio extends EditRecord
{
    protected static string $resource = TipoNegocioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\ModeloContratoResource\Pages;

use App\Filament\Resources\ModeloContratoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListModeloContratos extends ListRecords
{
    protected static string $resource = ModeloContratoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

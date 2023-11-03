<?php

namespace App\Filament\App\Resources\FormularioResource\Pages;

use App\Filament\App\Resources\FormularioResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFormularios extends ListRecords
{
    protected static string $resource = FormularioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\App\Resources\EntregavelResource\Pages;

use App\Filament\App\Resources\EntregavelResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEntregavels extends ListRecords
{
    protected static string $resource = EntregavelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\App\Resources\ServicoResource\Pages;

use App\Filament\App\Resources\ServicoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListServicos extends ListRecords
{
    protected static string $resource = ServicoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

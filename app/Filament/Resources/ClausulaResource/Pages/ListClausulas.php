<?php

namespace App\Filament\Resources\ClausulaResource\Pages;

use App\Filament\Resources\ClausulaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClausulas extends ListRecords
{
    protected static string $resource = ClausulaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

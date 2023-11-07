<?php

namespace App\Filament\App\Resources\ConfigResource\Pages;

use App\Filament\App\Resources\ConfigResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConfigs extends ListRecords
{
    protected static string $resource = ConfigResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

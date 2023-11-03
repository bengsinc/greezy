<?php

namespace App\Filament\App\Resources\EntregavelResource\Pages;

use App\Filament\App\Resources\EntregavelResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEntregavel extends EditRecord
{
    protected static string $resource = EntregavelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}

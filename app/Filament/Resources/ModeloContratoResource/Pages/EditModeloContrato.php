<?php

namespace App\Filament\Resources\ModeloContratoResource\Pages;

use App\Filament\Resources\ModeloContratoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditModeloContrato extends EditRecord
{
    protected static string $resource = ModeloContratoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}

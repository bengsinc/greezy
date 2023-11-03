<?php

namespace App\Filament\App\Resources\FormularioResource\Pages;

use App\Filament\App\Resources\FormularioResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFormulario extends EditRecord
{
    protected static string $resource = FormularioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}

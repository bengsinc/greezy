<?php

namespace App\Filament\Resources\ModeloContratoResource\Pages;

use App\Filament\Resources\ModeloContratoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateModeloContrato extends CreateRecord
{
    protected static string $resource = ModeloContratoResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;

    }
}

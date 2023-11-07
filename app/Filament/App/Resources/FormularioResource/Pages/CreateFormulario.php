<?php

namespace App\Filament\App\Resources\FormularioResource\Pages;

use App\Filament\App\Resources\FormularioResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFormulario extends CreateRecord
{
    protected static string $resource = FormularioResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;

    }
}

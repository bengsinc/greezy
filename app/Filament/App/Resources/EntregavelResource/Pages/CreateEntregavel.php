<?php

namespace App\Filament\App\Resources\EntregavelResource\Pages;

use App\Filament\App\Resources\EntregavelResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEntregavel extends CreateRecord
{
    protected static string $resource = EntregavelResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;

    }
}

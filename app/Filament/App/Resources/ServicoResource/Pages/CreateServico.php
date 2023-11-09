<?php

namespace App\Filament\App\Resources\ServicoResource\Pages;

use App\Filament\App\Resources\ServicoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateServico extends CreateRecord
{
    protected static string $resource = ServicoResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;

    }
}

<?php

namespace App\Filament\App\Resources\ConfigResource\Pages;

use App\Filament\App\Resources\ConfigResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateConfig extends CreateRecord
{
    protected static string $resource = ConfigResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;

    }
}

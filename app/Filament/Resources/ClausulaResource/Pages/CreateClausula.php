<?php

namespace App\Filament\Resources\ClausulaResource\Pages;

use App\Filament\Resources\ClausulaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateClausula extends CreateRecord
{
    protected static string $resource = ClausulaResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;

    }
}

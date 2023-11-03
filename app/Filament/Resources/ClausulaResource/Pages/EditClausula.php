<?php

namespace App\Filament\Resources\ClausulaResource\Pages;

use App\Filament\Resources\ClausulaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClausula extends EditRecord
{
    protected static string $resource = ClausulaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}

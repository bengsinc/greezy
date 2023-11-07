<?php

namespace App\Filament\App\Resources\ConfigResource\Pages;

use App\Filament\App\Resources\ConfigResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConfig extends EditRecord
{
    protected static string $resource = ConfigResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}

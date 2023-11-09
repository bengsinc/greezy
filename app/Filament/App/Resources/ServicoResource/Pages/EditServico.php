<?php

namespace App\Filament\App\Resources\ServicoResource\Pages;

use App\Filament\App\Resources\ServicoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditServico extends EditRecord
{
    protected static string $resource = ServicoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}

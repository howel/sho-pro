<?php

namespace App\Filament\Resources\ServicioTallerResource\Pages;

use App\Filament\Resources\ServicioTallerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditServicioTaller extends EditRecord
{
    protected static string $resource = ServicioTallerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

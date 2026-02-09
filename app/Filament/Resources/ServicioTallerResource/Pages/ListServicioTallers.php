<?php

namespace App\Filament\Resources\ServicioTallerResource\Pages;

use App\Filament\Resources\ServicioTallerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListServicioTallers extends ListRecords
{
    protected static string $resource = ServicioTallerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

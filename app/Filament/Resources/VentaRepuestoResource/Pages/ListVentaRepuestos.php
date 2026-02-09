<?php

namespace App\Filament\Resources\VentaRepuestoResource\Pages;

use App\Filament\Resources\VentaRepuestoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVentaRepuestos extends ListRecords
{
    protected static string $resource = VentaRepuestoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

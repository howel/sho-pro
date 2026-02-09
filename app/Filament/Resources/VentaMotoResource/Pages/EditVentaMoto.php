<?php

namespace App\Filament\Resources\VentaMotoResource\Pages;

use App\Filament\Resources\VentaMotoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVentaMoto extends EditRecord
{
    protected static string $resource = VentaMotoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\SoalTesResource\Pages;

use App\Filament\Resources\SoalTesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSoalTes extends EditRecord
{
    protected static string $resource = SoalTesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

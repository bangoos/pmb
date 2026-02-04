<?php

namespace App\Filament\Resources\SoalTesResource\Pages;

use App\Filament\Resources\SoalTesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSoalTes extends ListRecords
{
    protected static string $resource = SoalTesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

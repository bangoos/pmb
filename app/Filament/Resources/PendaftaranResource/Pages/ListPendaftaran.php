<?php

namespace App\Filament\Resources\PendaftaranResource\Pages;

use App\Filament\Resources\PendaftaranResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListPendaftaran extends ListRecords
{
    protected static string $resource = PendaftaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('Semua'),
            'pending' => Tab::make('Perlu Verifikasi')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('dokumen_terverifikasi', false)->where('tahap', '>=', 4)),
            'accepted' => Tab::make('Diterima')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('tahap', 5)),
        ];
    }
}

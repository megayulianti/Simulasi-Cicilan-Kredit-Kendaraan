<?php

namespace App\Filament\Resources\SimulasiResource\Pages;

use App\Filament\Resources\SimulasiResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListSimulasis extends ListRecords
{
    protected static string $resource = SimulasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Simulasi Baru'),
        ];
    }
}

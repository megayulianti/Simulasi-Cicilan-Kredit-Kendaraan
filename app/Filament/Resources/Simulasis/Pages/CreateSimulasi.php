<?php

namespace App\Filament\Resources\SimulasiResource\Pages;

use App\Filament\Resources\SimulasiResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSimulasi extends CreateRecord
{
    protected static string $resource = SimulasiResource::class;

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Simulasi berhasil disimpan!';
    }
}

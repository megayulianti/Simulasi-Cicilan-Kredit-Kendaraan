<?php

namespace App\Filament\Resources\SimulasiResource\Pages;

use App\Filament\Resources\SimulasiResource;
use Filament\Resources\Pages\EditRecord;

class EditSimulasi extends EditRecord
{
    protected static string $resource = SimulasiResource::class;

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Data simulasi berhasil diperbarui!';
    }
}

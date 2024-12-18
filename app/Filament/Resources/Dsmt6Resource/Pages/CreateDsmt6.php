<?php

namespace App\Filament\Resources\Dsmt6Resource\Pages;

use App\Filament\Resources\Dsmt6Resource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDsmt6 extends CreateRecord
{
    protected static string $resource = Dsmt6Resource::class;

    protected function getRedirectUrl(): string
    {
        // Mengarahkan ke halaman daftar setelah berhasil membuat data
        return $this->getResource()::getUrl('index');
    }
}

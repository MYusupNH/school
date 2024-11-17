<?php

namespace App\Filament\Resources\DbergaulResource\Pages;

use App\Filament\Resources\DbergaulResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDbergaul extends CreateRecord
{
    protected static string $resource = DbergaulResource::class;

    protected function getRedirectUrl(): string
    {
        // Mengarahkan ke halaman daftar setelah berhasil membuat data
        return $this->getResource()::getUrl('index');
    }
}
<?php

namespace App\Filament\Resources\SakitResource\Pages;

use App\Filament\Resources\SakitResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSakit extends CreateRecord
{
    protected static string $resource = SakitResource::class;

    protected function getRedirectUrl(): string
    {
        // Mengarahkan ke halaman daftar setelah berhasil membuat data
        return $this->getResource()::getUrl('index');
    }
}
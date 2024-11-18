<?php

namespace App\Filament\Resources\Dsmt4Resource\Pages;

use App\Filament\Resources\Dsmt4Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDsmt4 extends EditRecord
{
    protected static string $resource = Dsmt4Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

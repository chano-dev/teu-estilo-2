<?php

namespace App\Filament\Resources\Necklines\Pages;

use App\Filament\Resources\Necklines\NecklineResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditNeckline extends EditRecord
{
    protected static string $resource = NecklineResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

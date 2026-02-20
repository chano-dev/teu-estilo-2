<?php

namespace App\Filament\Resources\CapTypes\Pages;

use App\Filament\Resources\CapTypes\CapTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCapType extends EditRecord
{
    protected static string $resource = CapTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

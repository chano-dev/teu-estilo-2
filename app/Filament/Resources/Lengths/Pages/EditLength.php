<?php

namespace App\Filament\Resources\Lengths\Pages;

use App\Filament\Resources\Lengths\LengthResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLength extends EditRecord
{
    protected static string $resource = LengthResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

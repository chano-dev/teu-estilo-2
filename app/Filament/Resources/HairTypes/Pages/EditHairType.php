<?php

namespace App\Filament\Resources\HairTypes\Pages;

use App\Filament\Resources\HairTypes\HairTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHairType extends EditRecord
{
    protected static string $resource = HairTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

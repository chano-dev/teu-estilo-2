<?php

namespace App\Filament\Resources\HairOrigins\Pages;

use App\Filament\Resources\HairOrigins\HairOriginResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHairOrigin extends EditRecord
{
    protected static string $resource = HairOriginResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\HairDensities\Pages;

use App\Filament\Resources\HairDensities\HairDensityResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHairDensity extends EditRecord
{
    protected static string $resource = HairDensityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

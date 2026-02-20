<?php

namespace App\Filament\Resources\HairDensities\Pages;

use App\Filament\Resources\HairDensities\HairDensityResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHairDensities extends ListRecords
{
    protected static string $resource = HairDensityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

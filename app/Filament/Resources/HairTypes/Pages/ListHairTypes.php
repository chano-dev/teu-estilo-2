<?php

namespace App\Filament\Resources\HairTypes\Pages;

use App\Filament\Resources\HairTypes\HairTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHairTypes extends ListRecords
{
    protected static string $resource = HairTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

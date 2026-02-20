<?php

namespace App\Filament\Resources\HairOrigins\Pages;

use App\Filament\Resources\HairOrigins\HairOriginResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHairOrigins extends ListRecords
{
    protected static string $resource = HairOriginResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

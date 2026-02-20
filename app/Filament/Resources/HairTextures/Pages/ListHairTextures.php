<?php

namespace App\Filament\Resources\HairTextures\Pages;

use App\Filament\Resources\HairTextures\HairTextureResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHairTextures extends ListRecords
{
    protected static string $resource = HairTextureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

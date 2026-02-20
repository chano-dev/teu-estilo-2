<?php

namespace App\Filament\Resources\HairTextures\Pages;

use App\Filament\Resources\HairTextures\HairTextureResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHairTexture extends EditRecord
{
    protected static string $resource = HairTextureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

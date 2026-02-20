<?php

namespace App\Filament\Resources\CapTypes\Pages;

use App\Filament\Resources\CapTypes\CapTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCapTypes extends ListRecords
{
    protected static string $resource = CapTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

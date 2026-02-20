<?php

namespace App\Filament\Resources\HeelTypes\Pages;

use App\Filament\Resources\HeelTypes\HeelTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHeelTypes extends ListRecords
{
    protected static string $resource = HeelTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

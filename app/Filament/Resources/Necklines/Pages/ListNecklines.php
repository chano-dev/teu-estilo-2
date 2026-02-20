<?php

namespace App\Filament\Resources\Necklines\Pages;

use App\Filament\Resources\Necklines\NecklineResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListNecklines extends ListRecords
{
    protected static string $resource = NecklineResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

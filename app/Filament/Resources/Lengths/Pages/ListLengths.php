<?php

namespace App\Filament\Resources\Lengths\Pages;

use App\Filament\Resources\Lengths\LengthResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLengths extends ListRecords
{
    protected static string $resource = LengthResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

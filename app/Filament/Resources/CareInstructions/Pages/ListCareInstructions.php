<?php

namespace App\Filament\Resources\CareInstructions\Pages;

use App\Filament\Resources\CareInstructions\CareInstructionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCareInstructions extends ListRecords
{
    protected static string $resource = CareInstructionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

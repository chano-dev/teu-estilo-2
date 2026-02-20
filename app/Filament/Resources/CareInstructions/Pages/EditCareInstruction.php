<?php

namespace App\Filament\Resources\CareInstructions\Pages;

use App\Filament\Resources\CareInstructions\CareInstructionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCareInstruction extends EditRecord
{
    protected static string $resource = CareInstructionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

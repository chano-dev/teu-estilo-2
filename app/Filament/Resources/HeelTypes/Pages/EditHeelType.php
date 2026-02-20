<?php

namespace App\Filament\Resources\HeelTypes\Pages;

use App\Filament\Resources\HeelTypes\HeelTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHeelType extends EditRecord
{
    protected static string $resource = HeelTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

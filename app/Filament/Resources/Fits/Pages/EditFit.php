<?php

namespace App\Filament\Resources\Fits\Pages;

use App\Filament\Resources\Fits\FitResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFit extends EditRecord
{
    protected static string $resource = FitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

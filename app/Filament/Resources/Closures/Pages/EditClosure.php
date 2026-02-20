<?php

namespace App\Filament\Resources\Closures\Pages;

use App\Filament\Resources\Closures\ClosureResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditClosure extends EditRecord
{
    protected static string $resource = ClosureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

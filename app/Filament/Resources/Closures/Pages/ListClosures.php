<?php

namespace App\Filament\Resources\Closures\Pages;

use App\Filament\Resources\Closures\ClosureResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListClosures extends ListRecords
{
    protected static string $resource = ClosureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\ServiceAnnouncements\Pages;

use App\Filament\Resources\ServiceAnnouncements\ServiceAnnouncementResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListServiceAnnouncements extends ListRecords
{
    protected static string $resource = ServiceAnnouncementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

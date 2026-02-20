<?php

namespace App\Filament\Resources\ServiceAnnouncements\Pages;

use App\Filament\Resources\ServiceAnnouncements\ServiceAnnouncementResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditServiceAnnouncement extends EditRecord
{
    protected static string $resource = ServiceAnnouncementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

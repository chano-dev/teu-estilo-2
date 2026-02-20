<?php

namespace App\Filament\Resources\ServiceAnnouncements\Pages;

use App\Filament\Resources\ServiceAnnouncements\ServiceAnnouncementResource;
use Filament\Resources\Pages\CreateRecord;

class CreateServiceAnnouncement extends CreateRecord
{
    protected static string $resource = ServiceAnnouncementResource::class;
}

<?php

namespace App\Filament\Resources\ServiceInquiries\Pages;

use App\Filament\Resources\ServiceInquiries\ServiceInquiryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListServiceInquiries extends ListRecords
{
    protected static string $resource = ServiceInquiryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

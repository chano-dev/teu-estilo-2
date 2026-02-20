<?php

namespace App\Filament\Resources\ServiceInquiries\Pages;

use App\Filament\Resources\ServiceInquiries\ServiceInquiryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditServiceInquiry extends EditRecord
{
    protected static string $resource = ServiceInquiryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

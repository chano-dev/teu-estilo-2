<?php

namespace App\Filament\Resources\ServiceInquiries\Pages;

use App\Filament\Resources\ServiceInquiries\ServiceInquiryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateServiceInquiry extends CreateRecord
{
    protected static string $resource = ServiceInquiryResource::class;
}

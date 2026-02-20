<?php

namespace App\Filament\Resources\ServiceInquiries;

use App\Filament\Resources\ServiceInquiries\Pages\CreateServiceInquiry;
use App\Filament\Resources\ServiceInquiries\Pages\EditServiceInquiry;
use App\Filament\Resources\ServiceInquiries\Pages\ListServiceInquiries;
use App\Filament\Resources\ServiceInquiries\Schemas\ServiceInquiryForm;
use App\Filament\Resources\ServiceInquiries\Tables\ServiceInquiriesTable;
use App\Models\ServiceInquiry;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ServiceInquiryResource extends Resource
{
    protected static ?string $model = ServiceInquiry::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ServiceInquiryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ServiceInquiriesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListServiceInquiries::route('/'),
            'create' => CreateServiceInquiry::route('/create'),
            'edit' => EditServiceInquiry::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources\ServiceAnnouncements;

use App\Filament\Resources\ServiceAnnouncements\Pages\CreateServiceAnnouncement;
use App\Filament\Resources\ServiceAnnouncements\Pages\EditServiceAnnouncement;
use App\Filament\Resources\ServiceAnnouncements\Pages\ListServiceAnnouncements;
use App\Filament\Resources\ServiceAnnouncements\Schemas\ServiceAnnouncementForm;
use App\Filament\Resources\ServiceAnnouncements\Tables\ServiceAnnouncementsTable;
use App\Models\ServiceAnnouncement;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ServiceAnnouncementResource extends Resource
{
    protected static ?string $model = ServiceAnnouncement::class;

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedWrenchScrewdriver;

    protected static string|\UnitEnum|null $navigationGroup = 'Serviços';

    protected static ?string $modelLabel = 'Anúncio de Serviço';

    protected static ?string $pluralModelLabel = 'Anúncios de Serviço';

    protected static ?int $navigationSort = 3;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return ServiceAnnouncementForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ServiceAnnouncementsTable::configure($table);
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
            'index' => ListServiceAnnouncements::route('/'),
            'create' => CreateServiceAnnouncement::route('/create'),
            'edit' => EditServiceAnnouncement::route('/{record}/edit'),
        ];
    }
}

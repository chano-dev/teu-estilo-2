<?php

namespace App\Filament\Resources\HairOrigins;

use App\Filament\Resources\HairOrigins\Pages\CreateHairOrigin;
use App\Filament\Resources\HairOrigins\Pages\EditHairOrigin;
use App\Filament\Resources\HairOrigins\Pages\ListHairOrigins;
use App\Filament\Resources\HairOrigins\Schemas\HairOriginForm;
use App\Filament\Resources\HairOrigins\Tables\HairOriginsTable;
use App\Models\HairOrigin;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HairOriginResource extends Resource
{
    protected static ?string $model = HairOrigin::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return HairOriginForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HairOriginsTable::configure($table);
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
            'index' => ListHairOrigins::route('/'),
            'create' => CreateHairOrigin::route('/create'),
            'edit' => EditHairOrigin::route('/{record}/edit'),
        ];
    }
}

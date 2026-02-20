<?php

namespace App\Filament\Resources\HairDensities;

use App\Filament\Resources\HairDensities\Pages\CreateHairDensity;
use App\Filament\Resources\HairDensities\Pages\EditHairDensity;
use App\Filament\Resources\HairDensities\Pages\ListHairDensities;
use App\Filament\Resources\HairDensities\Schemas\HairDensityForm;
use App\Filament\Resources\HairDensities\Tables\HairDensitiesTable;
use App\Models\HairDensity;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HairDensityResource extends Resource
{
    protected static ?string $model = HairDensity::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return HairDensityForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HairDensitiesTable::configure($table);
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
            'index' => ListHairDensities::route('/'),
            'create' => CreateHairDensity::route('/create'),
            'edit' => EditHairDensity::route('/{record}/edit'),
        ];
    }
}

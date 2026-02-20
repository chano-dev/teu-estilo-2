<?php

namespace App\Filament\Resources\HairTypes;

use App\Filament\Resources\HairTypes\Pages\CreateHairType;
use App\Filament\Resources\HairTypes\Pages\EditHairType;
use App\Filament\Resources\HairTypes\Pages\ListHairTypes;
use App\Filament\Resources\HairTypes\Schemas\HairTypeForm;
use App\Filament\Resources\HairTypes\Tables\HairTypesTable;
use App\Models\HairType;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HairTypeResource extends Resource
{
    protected static ?string $model = HairType::class;

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedScissors;

    protected static string|\UnitEnum|null $navigationGroup = 'Perucas';

    protected static ?string $modelLabel = 'Tipo de Cabelo';

    protected static ?string $pluralModelLabel = 'Tipos de Cabelo';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return HairTypeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HairTypesTable::configure($table);
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
            'index' => ListHairTypes::route('/'),
            'create' => CreateHairType::route('/create'),
            'edit' => EditHairType::route('/{record}/edit'),
        ];
    }
}

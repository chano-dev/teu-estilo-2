<?php

namespace App\Filament\Resources\HeelTypes;

use App\Filament\Resources\HeelTypes\Pages\CreateHeelType;
use App\Filament\Resources\HeelTypes\Pages\EditHeelType;
use App\Filament\Resources\HeelTypes\Pages\ListHeelTypes;
use App\Filament\Resources\HeelTypes\Schemas\HeelTypeForm;
use App\Filament\Resources\HeelTypes\Tables\HeelTypesTable;
use App\Models\HeelType;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HeelTypeResource extends Resource
{
    protected static ?string $model = HeelType::class;

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedSwatch;

    protected static string|\UnitEnum|null $navigationGroup = 'Atributos';

    protected static ?string $modelLabel = 'Tipo de Salto';

    protected static ?string $pluralModelLabel = 'Tipos de Salto';

    protected static ?int $navigationSort = 11;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return HeelTypeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HeelTypesTable::configure($table);
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
            'index' => ListHeelTypes::route('/'),
            'create' => CreateHeelType::route('/create'),
            'edit' => EditHeelType::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources\CapTypes;

use App\Filament\Resources\CapTypes\Pages\CreateCapType;
use App\Filament\Resources\CapTypes\Pages\EditCapType;
use App\Filament\Resources\CapTypes\Pages\ListCapTypes;
use App\Filament\Resources\CapTypes\Schemas\CapTypeForm;
use App\Filament\Resources\CapTypes\Tables\CapTypesTable;
use App\Models\CapType;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CapTypeResource extends Resource
{
    protected static ?string $model = CapType::class;

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedScissors;

    protected static string|\UnitEnum|null $navigationGroup = 'Perucas';

    protected static ?string $modelLabel = 'Tipo de Touca';

    protected static ?string $pluralModelLabel = 'Tipos de Touca';

    protected static ?int $navigationSort = 3;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return CapTypeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CapTypesTable::configure($table);
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
            'index' => ListCapTypes::route('/'),
            'create' => CreateCapType::route('/create'),
            'edit' => EditCapType::route('/{record}/edit'),
        ];
    }
}

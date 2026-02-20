<?php

namespace App\Filament\Resources\Necklines;

use App\Filament\Resources\Necklines\Pages\CreateNeckline;
use App\Filament\Resources\Necklines\Pages\EditNeckline;
use App\Filament\Resources\Necklines\Pages\ListNecklines;
use App\Filament\Resources\Necklines\Schemas\NecklineForm;
use App\Filament\Resources\Necklines\Tables\NecklinesTable;
use App\Models\Neckline;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class NecklineResource extends Resource
{
    protected static ?string $model = Neckline::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSwatch;

    protected static ?string $navigationGroup = 'Atributos';

    protected static ?string $modelLabel = 'Decote';

    protected static ?string $pluralModelLabel = 'Decotes';

    protected static ?int $navigationSort = 9;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return NecklineForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return NecklinesTable::configure($table);
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
            'index' => ListNecklines::route('/'),
            'create' => CreateNeckline::route('/create'),
            'edit' => EditNeckline::route('/{record}/edit'),
        ];
    }
}

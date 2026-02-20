<?php

namespace App\Filament\Resources\Closures;

use App\Filament\Resources\Closures\Pages\CreateClosure;
use App\Filament\Resources\Closures\Pages\EditClosure;
use App\Filament\Resources\Closures\Pages\ListClosures;
use App\Filament\Resources\Closures\Schemas\ClosureForm;
use App\Filament\Resources\Closures\Tables\ClosuresTable;
use App\Models\Closure;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ClosureResource extends Resource
{
    protected static ?string $model = Closure::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSwatch;

    protected static ?string $navigationGroup = 'Atributos';

    protected static ?string $modelLabel = 'Fecho';

    protected static ?string $pluralModelLabel = 'Fechos';

    protected static ?int $navigationSort = 12;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return ClosureForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ClosuresTable::configure($table);
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
            'index' => ListClosures::route('/'),
            'create' => CreateClosure::route('/create'),
            'edit' => EditClosure::route('/{record}/edit'),
        ];
    }
}

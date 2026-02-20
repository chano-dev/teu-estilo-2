<?php

namespace App\Filament\Resources\Patterns;

use App\Filament\Resources\Patterns\Pages\CreatePattern;
use App\Filament\Resources\Patterns\Pages\EditPattern;
use App\Filament\Resources\Patterns\Pages\ListPatterns;
use App\Filament\Resources\Patterns\Schemas\PatternForm;
use App\Filament\Resources\Patterns\Tables\PatternsTable;
use App\Models\Pattern;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PatternResource extends Resource
{
    protected static ?string $model = Pattern::class;

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedSwatch;

    protected static string|\UnitEnum|null $navigationGroup = 'Atributos';

    protected static ?string $modelLabel = 'Padrão';

    protected static ?string $pluralModelLabel = 'Padrões';

    protected static ?int $navigationSort = 6;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return PatternForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PatternsTable::configure($table);
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
            'index' => ListPatterns::route('/'),
            'create' => CreatePattern::route('/create'),
            'edit' => EditPattern::route('/{record}/edit'),
        ];
    }
}

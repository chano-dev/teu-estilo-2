<?php

namespace App\Filament\Resources\Lengths;

use App\Filament\Resources\Lengths\Pages\CreateLength;
use App\Filament\Resources\Lengths\Pages\EditLength;
use App\Filament\Resources\Lengths\Pages\ListLengths;
use App\Filament\Resources\Lengths\Schemas\LengthForm;
use App\Filament\Resources\Lengths\Tables\LengthsTable;
use App\Models\Length;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LengthResource extends Resource
{
    protected static ?string $model = Length::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return LengthForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LengthsTable::configure($table);
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
            'index' => ListLengths::route('/'),
            'create' => CreateLength::route('/create'),
            'edit' => EditLength::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources\Fits;

use App\Filament\Resources\Fits\Pages\CreateFit;
use App\Filament\Resources\Fits\Pages\EditFit;
use App\Filament\Resources\Fits\Pages\ListFits;
use App\Filament\Resources\Fits\Schemas\FitForm;
use App\Filament\Resources\Fits\Tables\FitsTable;
use App\Models\Fit;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FitResource extends Resource
{
    protected static ?string $model = Fit::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return FitForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FitsTable::configure($table);
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
            'index' => ListFits::route('/'),
            'create' => CreateFit::route('/create'),
            'edit' => EditFit::route('/{record}/edit'),
        ];
    }
}

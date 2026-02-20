<?php

namespace App\Filament\Resources\CareInstructions;

use App\Filament\Resources\CareInstructions\Pages\CreateCareInstruction;
use App\Filament\Resources\CareInstructions\Pages\EditCareInstruction;
use App\Filament\Resources\CareInstructions\Pages\ListCareInstructions;
use App\Filament\Resources\CareInstructions\Schemas\CareInstructionForm;
use App\Filament\Resources\CareInstructions\Tables\CareInstructionsTable;
use App\Models\CareInstruction;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CareInstructionResource extends Resource
{
    protected static ?string $model = CareInstruction::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return CareInstructionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CareInstructionsTable::configure($table);
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
            'index' => ListCareInstructions::route('/'),
            'create' => CreateCareInstruction::route('/create'),
            'edit' => EditCareInstruction::route('/{record}/edit'),
        ];
    }
}

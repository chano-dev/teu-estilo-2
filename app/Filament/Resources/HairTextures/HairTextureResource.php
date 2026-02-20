<?php

namespace App\Filament\Resources\HairTextures;

use App\Filament\Resources\HairTextures\Pages\CreateHairTexture;
use App\Filament\Resources\HairTextures\Pages\EditHairTexture;
use App\Filament\Resources\HairTextures\Pages\ListHairTextures;
use App\Filament\Resources\HairTextures\Schemas\HairTextureForm;
use App\Filament\Resources\HairTextures\Tables\HairTexturesTable;
use App\Models\HairTexture;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HairTextureResource extends Resource
{
    protected static ?string $model = HairTexture::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return HairTextureForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HairTexturesTable::configure($table);
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
            'index' => ListHairTextures::route('/'),
            'create' => CreateHairTexture::route('/create'),
            'edit' => EditHairTexture::route('/{record}/edit'),
        ];
    }
}

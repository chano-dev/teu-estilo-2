<?php

namespace App\Filament\Resources\HairTypes\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class HairTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('characteristics')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('durability')
                    ->default(null),
                TextInput::make('price_range')
                    ->default(null),
                Toggle::make('can_be_dyed')
                    ->required(),
                Toggle::make('can_be_heat_styled')
                    ->required(),
                Toggle::make('is_active')
                    ->required(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}

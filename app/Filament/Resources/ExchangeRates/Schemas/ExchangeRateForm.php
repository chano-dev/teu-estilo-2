<?php

namespace App\Filament\Resources\ExchangeRates\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ExchangeRateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('currency_from')
                    ->required(),
                TextInput::make('currency_to')
                    ->required()
                    ->default('AOA'),
                TextInput::make('rate')
                    ->required()
                    ->numeric(),
                TextInput::make('margin_percentage')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                Toggle::make('is_active')
                    ->required(),
                DateTimePicker::make('effective_from'),
            ]);
    }
}

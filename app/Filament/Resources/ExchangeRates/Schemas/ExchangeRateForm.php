<?php

namespace App\Filament\Resources\ExchangeRates\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ExchangeRateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Moedas')
                    ->columns(2)
                    ->schema([
                        TextInput::make('currency_from')
                            ->label('Moeda de Origem')
                            ->required()
                            ->maxLength(3)
                            ->placeholder('USD'),

                        TextInput::make('currency_to')
                            ->label('Moeda de Destino')
                            ->required()
                            ->maxLength(3)
                            ->default('AOA'),
                    ]),

                Section::make('Taxa')
                    ->columns(2)
                    ->schema([
                        TextInput::make('rate')
                            ->label('Taxa de Câmbio')
                            ->required()
                            ->numeric()
                            ->step(0.0001),

                        TextInput::make('margin_percentage')
                            ->label('Margem')
                            ->numeric()
                            ->suffix('%')
                            ->default(0),
                    ]),

                Section::make('Configurações')
                    ->columns(2)
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Activo')
                            ->default(true),

                        DateTimePicker::make('effective_from')
                            ->label('Vigente a partir de'),
                    ]),
            ]);
    }
}

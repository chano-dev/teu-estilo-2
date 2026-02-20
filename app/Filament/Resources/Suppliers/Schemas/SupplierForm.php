<?php

namespace App\Filament\Resources\Suppliers\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SupplierForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('company_name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('tax_id')
                    ->default(null),
                TextInput::make('sku_code')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->default(null),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                TextInput::make('whatsapp')
                    ->default(null),
                TextInput::make('address')
                    ->default(null),
                TextInput::make('city')
                    ->default(null),
                TextInput::make('province')
                    ->default(null),
                TextInput::make('country')
                    ->required()
                    ->default('Angola'),
                TextInput::make('payment_terms')
                    ->default(null),
                TextInput::make('bank_name')
                    ->default(null),
                TextInput::make('bank_account')
                    ->default(null),
                Toggle::make('is_consignment')
                    ->required(),
                TextInput::make('commission_percentage')
                    ->numeric()
                    ->default(null),
                TextInput::make('rating')
                    ->numeric()
                    ->default(null),
                Toggle::make('is_active')
                    ->required(),
                Textarea::make('notes')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}

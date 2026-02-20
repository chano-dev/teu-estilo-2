<?php

namespace App\Filament\Resources\Suppliers\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class SupplierForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Dados do Fornecedor')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('Nome')
                            ->required()
                            ->maxLength(100)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($set, ?string $state) => $set('slug', Str::slug($state ?? ''))),

                        TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->maxLength(100)
                            ->unique(ignoreRecord: true),

                        TextInput::make('company_name')
                            ->label('Empresa')
                            ->required()
                            ->maxLength(150),

                        TextInput::make('tax_id')
                            ->label('NIF'),

                        TextInput::make('sku_code')
                            ->label('Código SKU')
                            ->required()
                            ->maxLength(20),
                    ]),

                Section::make('Contacto')
                    ->columns(2)
                    ->schema([
                        TextInput::make('email')
                            ->label('Email')
                            ->email(),

                        TextInput::make('phone')
                            ->label('Telefone')
                            ->tel()
                            ->required(),

                        TextInput::make('whatsapp')
                            ->label('WhatsApp'),
                    ]),

                Section::make('Endereço')
                    ->columns(2)
                    ->schema([
                        TextInput::make('address')
                            ->label('Morada'),

                        TextInput::make('city')
                            ->label('Cidade'),

                        Select::make('province')
                            ->label('Província')
                            ->options([
                                'Bengo' => 'Bengo',
                                'Benguela' => 'Benguela',
                                'Bié' => 'Bié',
                                'Cabinda' => 'Cabinda',
                                'Cuando Cubango' => 'Cuando Cubango',
                                'Cuanza Norte' => 'Cuanza Norte',
                                'Cuanza Sul' => 'Cuanza Sul',
                                'Cunene' => 'Cunene',
                                'Huambo' => 'Huambo',
                                'Huíla' => 'Huíla',
                                'Luanda' => 'Luanda',
                                'Lunda Norte' => 'Lunda Norte',
                                'Lunda Sul' => 'Lunda Sul',
                                'Malanje' => 'Malanje',
                                'Moxico' => 'Moxico',
                                'Namibe' => 'Namibe',
                                'Uíge' => 'Uíge',
                                'Zaire' => 'Zaire',
                            ])
                            ->searchable(),

                        TextInput::make('country')
                            ->label('País')
                            ->default('Angola'),
                    ]),

                Section::make('Comercial')
                    ->columns(2)
                    ->schema([
                        Toggle::make('is_consignment')
                            ->label('Consignação')
                            ->default(false),

                        TextInput::make('commission_percentage')
                            ->label('Comissão')
                            ->numeric()
                            ->suffix('%'),

                        TextInput::make('payment_terms')
                            ->label('Termos de Pagamento'),

                        TextInput::make('rating')
                            ->label('Avaliação')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(5),
                    ]),

                Section::make('Dados Bancários')
                    ->collapsed()
                    ->columns(2)
                    ->schema([
                        TextInput::make('bank_name')
                            ->label('Banco'),

                        TextInput::make('bank_account')
                            ->label('Conta Bancária'),
                    ]),

                Section::make('Configurações')
                    ->columns(2)
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Activo')
                            ->default(true),

                        Textarea::make('notes')
                            ->label('Notas')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}

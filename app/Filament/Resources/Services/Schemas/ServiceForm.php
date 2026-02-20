<?php

namespace App\Filament\Resources\Services\Schemas;

use App\Enums\PriceType;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Identificação')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('Nome')
                            ->required()
                            ->maxLength(200)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($set, ?string $state) => $set('slug', Str::slug($state ?? ''))),

                        TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->maxLength(220)
                            ->unique(ignoreRecord: true),

                        RichEditor::make('description')
                            ->label('Descrição Completa')
                            ->columnSpanFull(),

                        TextInput::make('short_description')
                            ->label('Descrição Curta')
                            ->maxLength(300),

                        Select::make('subcategory_id')
                            ->label('Subcategoria')
                            ->relationship('subcategory', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('segment_id')
                            ->label('Segmento')
                            ->relationship('segment', 'name')
                            ->searchable()
                            ->preload(),
                    ]),

                Section::make('Preços')
                    ->columns(3)
                    ->schema([
                        TextInput::make('base_price')
                            ->label('Preço Base')
                            ->required()
                            ->numeric()
                            ->prefix('Kz'),

                        Select::make('price_type')
                            ->label('Tipo de Preço')
                            ->options(PriceType::class)
                            ->default('fixed')
                            ->required(),

                        TextInput::make('deposit_percentage')
                            ->label('Depósito')
                            ->numeric()
                            ->suffix('%')
                            ->default(0),
                    ]),

                Section::make('Requisitos')
                    ->columns(3)
                    ->schema([
                        Toggle::make('requires_measurements')
                            ->label('Requer Medidas')
                            ->default(false),

                        Toggle::make('requires_deposit')
                            ->label('Requer Depósito')
                            ->default(false),

                        TextInput::make('duration_minutes')
                            ->label('Duração (min)')
                            ->numeric(),

                        TextInput::make('max_advance_booking_days')
                            ->label('Máx. Dias Antecedência')
                            ->numeric(),

                        Textarea::make('available_days')
                            ->label('Dias Disponíveis')
                            ->rows(2)
                            ->columnSpanFull(),

                        Textarea::make('available_hours')
                            ->label('Horários Disponíveis')
                            ->rows(2)
                            ->columnSpanFull(),
                    ]),

                Section::make('Imagem')
                    ->schema([
                        FileUpload::make('image_path')
                            ->label('Imagem')
                            ->image()
                            ->disk('public')
                            ->directory('services'),
                    ]),

                Section::make('Configurações')
                    ->columns(3)
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Activo')
                            ->default(true),

                        Toggle::make('is_featured')
                            ->label('Destaque')
                            ->default(false),

                        TextInput::make('sort_order')
                            ->label('Ordem')
                            ->numeric()
                            ->default(0),
                    ]),

                Section::make('SEO')
                    ->collapsed()
                    ->schema([
                        TextInput::make('meta_title')
                            ->label('Meta Título')
                            ->maxLength(255),

                        Textarea::make('meta_description')
                            ->label('Meta Descrição')
                            ->rows(2)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}

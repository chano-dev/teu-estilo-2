<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Enums\ProductCondition;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProductForm
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

                        TextInput::make('sku')
                            ->label('SKU')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(50),

                        TextInput::make('barcode')
                            ->label('Código de Barras')
                            ->maxLength(50),
                    ]),

                Section::make('Descrição')
                    ->schema([
                        RichEditor::make('description')
                            ->label('Descrição Completa')
                            ->columnSpanFull(),

                        TextInput::make('short_description')
                            ->label('Descrição Curta')
                            ->maxLength(300),
                    ]),

                Section::make('Classificação')
                    ->columns(3)
                    ->schema([
                        Select::make('subcategory_id')
                            ->label('Subcategoria')
                            ->relationship('subcategory', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('brand_id')
                            ->label('Marca')
                            ->relationship('brand', 'name')
                            ->searchable()
                            ->preload(),

                        Select::make('collection_id')
                            ->label('Coleção')
                            ->relationship('collection', 'name')
                            ->searchable()
                            ->preload(),
                    ]),

                Section::make('Preços')
                    ->columns(3)
                    ->schema([
                        TextInput::make('price_cost')
                            ->label('Preço de Custo')
                            ->required()
                            ->numeric()
                            ->prefix('Kz')
                            ->default(0),

                        TextInput::make('price_sell')
                            ->label('Preço de Venda')
                            ->required()
                            ->numeric()
                            ->prefix('Kz'),

                        TextInput::make('discount_percentage')
                            ->label('Desconto')
                            ->numeric()
                            ->suffix('%')
                            ->default(0),
                    ]),

                Section::make('Configurações do Produto')
                    ->columns(3)
                    ->schema([
                        Select::make('condition')
                            ->label('Condição')
                            ->options(ProductCondition::class)
                            ->default('new')
                            ->required(),

                        TextInput::make('stock_min')
                            ->label('Stock Mínimo')
                            ->numeric()
                            ->default(0),

                        TextInput::make('weight')
                            ->label('Peso (g)')
                            ->numeric(),

                        Toggle::make('is_active')
                            ->label('Activo')
                            ->default(true),

                        Toggle::make('is_featured')
                            ->label('Destaque')
                            ->default(false),

                        Toggle::make('is_new')
                            ->label('Novo')
                            ->default(true),

                        Toggle::make('is_trending')
                            ->label('Tendência')
                            ->default(false),

                        Toggle::make('is_bestseller')
                            ->label('Mais Vendido')
                            ->default(false),

                        Toggle::make('is_on_sale')
                            ->label('Em Promoção')
                            ->default(false),
                    ]),

                Section::make('Publicação')
                    ->collapsed()
                    ->columns(3)
                    ->schema([
                        DateTimePicker::make('published_at')
                            ->label('Publicado em'),

                        DateTimePicker::make('publish_start')
                            ->label('Publicar a partir de'),

                        DateTimePicker::make('publish_end')
                            ->label('Publicar até'),
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

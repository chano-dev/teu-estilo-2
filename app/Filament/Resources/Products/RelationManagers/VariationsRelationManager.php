<?php

namespace App\Filament\Resources\Products\RelationManagers;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class VariationsRelationManager extends RelationManager
{
    protected static string $relationship = 'variations';

    protected static ?string $title = 'Variações';

    protected static ?string $modelLabel = 'Variação';

    protected static ?string $pluralModelLabel = 'Variações';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                Select::make('color_id')
                    ->label('Cor')
                    ->relationship('color', 'name')
                    ->searchable()
                    ->preload(),

                Select::make('size_id')
                    ->label('Tamanho')
                    ->relationship('size', 'name')
                    ->searchable()
                    ->preload(),

                TextInput::make('sku_variation')
                    ->label('SKU da Variação')
                    ->required()
                    ->maxLength(50),

                TextInput::make('barcode_variation')
                    ->label('Código de Barras'),

                TextInput::make('price_adjustment')
                    ->label('Ajuste de Preço')
                    ->numeric()
                    ->prefix('Kz')
                    ->default(0),

                TextInput::make('stock_quantity')
                    ->label('Stock')
                    ->numeric()
                    ->required()
                    ->default(0),

                TextInput::make('stock_reserved')
                    ->label('Stock Reservado')
                    ->numeric()
                    ->default(0),

                Toggle::make('is_active')
                    ->label('Activo')
                    ->default(true),

                FileUpload::make('image_path')
                    ->label('Imagem')
                    ->image()
                    ->disk('public')
                    ->directory('product-variations')
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('sku_variation')
            ->columns([
                ImageColumn::make('image_path')
                    ->label('Imagem')
                    ->circular(),

                TextColumn::make('color.name')
                    ->label('Cor')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('size.name')
                    ->label('Tamanho')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('sku_variation')
                    ->label('SKU')
                    ->searchable(),

                TextColumn::make('price_adjustment')
                    ->label('Ajuste Preço')
                    ->prefix('Kz ')
                    ->numeric(decimalPlaces: 2)
                    ->sortable(),

                TextColumn::make('stock_quantity')
                    ->label('Stock')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('stock_reserved')
                    ->label('Reservado')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                IconColumn::make('is_active')
                    ->label('Activo')
                    ->boolean(),
            ])
            ->defaultSort('sku_variation')
            ->filters([
                TernaryFilter::make('is_active')
                    ->label('Activo'),
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

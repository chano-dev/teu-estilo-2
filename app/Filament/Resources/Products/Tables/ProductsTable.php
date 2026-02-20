<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nome')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('sku')
                    ->label('SKU')
                    ->searchable(),

                TextColumn::make('subcategory.name')
                    ->label('Subcategoria')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('brand.name')
                    ->label('Marca')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('price_sell')
                    ->label('Preço')
                    ->prefix('Kz ')
                    ->numeric(decimalPlaces: 2)
                    ->sortable(),

                TextColumn::make('condition')
                    ->label('Condição')
                    ->badge(),

                IconColumn::make('is_active')
                    ->label('Activo')
                    ->boolean()
                    ->sortable(),

                IconColumn::make('is_featured')
                    ->label('Destaque')
                    ->boolean(),

                TextColumn::make('views_count')
                    ->label('Vistas')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('sales_count')
                    ->label('Vendas')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Actualizado')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('deleted_at')
                    ->label('Eliminado')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('updated_at', 'desc')
            ->filters([
                TrashedFilter::make(),
                TernaryFilter::make('is_active')
                    ->label('Activo'),
                TernaryFilter::make('is_featured')
                    ->label('Destaque'),
                SelectFilter::make('subcategory')
                    ->label('Subcategoria')
                    ->relationship('subcategory', 'name'),
                SelectFilter::make('condition')
                    ->label('Condição')
                    ->options(\App\Enums\ProductCondition::class),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}

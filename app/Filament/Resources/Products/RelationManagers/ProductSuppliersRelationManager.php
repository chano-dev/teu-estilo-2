<?php

namespace App\Filament\Resources\Products\RelationManagers;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class ProductSuppliersRelationManager extends RelationManager
{
    protected static string $relationship = 'productSuppliers';

    protected static ?string $title = 'Fornecedores';

    protected static ?string $modelLabel = 'Fornecedor do Produto';

    protected static ?string $pluralModelLabel = 'Fornecedores do Produto';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                Select::make('supplier_id')
                    ->label('Fornecedor')
                    ->relationship('supplier', 'company_name')
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('cost_price')
                    ->label('Preço de Custo')
                    ->numeric()
                    ->prefix('Kz'),

                TextInput::make('commission_percentage')
                    ->label('Comissão')
                    ->numeric()
                    ->suffix('%'),

                TextInput::make('lead_time_days')
                    ->label('Prazo de Entrega (dias)')
                    ->numeric(),

                TextInput::make('min_order_quantity')
                    ->label('Quantidade Mínima')
                    ->numeric(),

                Toggle::make('is_preferred')
                    ->label('Preferencial')
                    ->default(false),

                Toggle::make('is_active')
                    ->label('Activo')
                    ->default(true),

                Textarea::make('notes')
                    ->label('Notas')
                    ->rows(3)
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('supplier_id')
            ->columns([
                TextColumn::make('supplier.company_name')
                    ->label('Fornecedor')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('cost_price')
                    ->label('Custo')
                    ->prefix('Kz ')
                    ->numeric(decimalPlaces: 2)
                    ->sortable(),

                TextColumn::make('commission_percentage')
                    ->label('Comissão')
                    ->suffix('%')
                    ->sortable(),

                TextColumn::make('lead_time_days')
                    ->label('Prazo (dias)')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('min_order_quantity')
                    ->label('Qt. Mínima')
                    ->numeric()
                    ->toggleable(isToggledHiddenByDefault: true),

                IconColumn::make('is_preferred')
                    ->label('Preferencial')
                    ->boolean(),

                IconColumn::make('is_active')
                    ->label('Activo')
                    ->boolean(),
            ])
            ->filters([
                TernaryFilter::make('is_preferred')
                    ->label('Preferencial'),
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

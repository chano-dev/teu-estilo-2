<?php

namespace App\Filament\Resources\Products\RelationManagers;

use App\Enums\ImageType;
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

class ImagesRelationManager extends RelationManager
{
    protected static string $relationship = 'images';

    protected static ?string $title = 'Imagens';

    protected static ?string $modelLabel = 'Imagem';

    protected static ?string $pluralModelLabel = 'Imagens';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                FileUpload::make('file_path')
                    ->label('Imagem')
                    ->image()
                    ->disk('public')
                    ->directory('product-images')
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('file_name')
                    ->label('Nome do Ficheiro')
                    ->required()
                    ->maxLength(255),

                Select::make('image_type')
                    ->label('Tipo de Imagem')
                    ->options(ImageType::class)
                    ->default('main')
                    ->required(),

                Select::make('variation_id')
                    ->label('Variação')
                    ->relationship('variation', 'sku_variation')
                    ->searchable()
                    ->preload(),

                TextInput::make('alt_text')
                    ->label('Texto Alternativo')
                    ->maxLength(255),

                Toggle::make('is_primary')
                    ->label('Imagem Principal')
                    ->default(false),

                TextInput::make('sort_order')
                    ->label('Ordem')
                    ->numeric()
                    ->default(0),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('file_name')
            ->columns([
                ImageColumn::make('file_path')
                    ->label('Imagem')
                    ->square()
                    ->size(60),

                TextColumn::make('file_name')
                    ->label('Nome')
                    ->searchable()
                    ->limit(30),

                TextColumn::make('image_type')
                    ->label('Tipo')
                    ->badge(),

                TextColumn::make('variation.sku_variation')
                    ->label('Variação')
                    ->placeholder('—'),

                IconColumn::make('is_primary')
                    ->label('Principal')
                    ->boolean(),

                TextColumn::make('sort_order')
                    ->label('Ordem')
                    ->sortable(),
            ])
            ->defaultSort('sort_order')
            ->filters([
                TernaryFilter::make('is_primary')
                    ->label('Principal'),
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

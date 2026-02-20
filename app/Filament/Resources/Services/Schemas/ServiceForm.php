<?php

namespace App\Filament\Resources\Services\Schemas;

use App\Enums\PriceType;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('short_description')
                    ->default(null),
                Select::make('subcategory_id')
                    ->relationship('subcategory', 'name')
                    ->required(),
                Select::make('segment_id')
                    ->relationship('segment', 'name')
                    ->default(null),
                TextInput::make('base_price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                Select::make('price_type')
                    ->options(PriceType::class)
                    ->default('fixed')
                    ->required(),
                Toggle::make('requires_measurements')
                    ->required(),
                Toggle::make('requires_deposit')
                    ->required(),
                TextInput::make('deposit_percentage')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('duration_minutes')
                    ->numeric()
                    ->default(null),
                Textarea::make('available_days')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('available_hours')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('max_advance_booking_days')
                    ->numeric()
                    ->default(null),
                FileUpload::make('image_path')
                    ->image(),
                Toggle::make('is_active')
                    ->required(),
                Toggle::make('is_featured')
                    ->required(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('meta_title')
                    ->default(null),
                Textarea::make('meta_description')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}

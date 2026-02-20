<?php

namespace App\Filament\Resources\Brands\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class BrandForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informações da Marca')
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

                        Textarea::make('description')
                            ->label('Descrição')
                            ->rows(3)
                            ->columnSpanFull(),

                        TextInput::make('country_origin')
                            ->label('País de Origem'),

                        TextInput::make('website')
                            ->label('Website')
                            ->url(),
                    ]),

                Section::make('Imagens')
                    ->columns(2)
                    ->schema([
                        FileUpload::make('logo_path')
                            ->label('Logo')
                            ->image()
                            ->disk('public')
                            ->directory('brands/logos'),

                        FileUpload::make('banner_path')
                            ->label('Banner')
                            ->image()
                            ->disk('public')
                            ->directory('brands/banners'),
                    ]),

                Section::make('Configurações')
                    ->columns(2)
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

<?php

namespace App\Filament\Resources\Collections\Schemas;

use App\Enums\Season;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class CollectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informações da Coleção')
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

                        TextInput::make('year')
                            ->label('Ano')
                            ->required()
                            ->numeric(),

                        Select::make('season')
                            ->label('Estação')
                            ->options(Season::class)
                            ->required(),

                        DatePicker::make('starts_at')
                            ->label('Início'),

                        DatePicker::make('ends_at')
                            ->label('Fim'),

                        FileUpload::make('image_path')
                            ->label('Imagem')
                            ->image()
                            ->disk('public')
                            ->directory('collections'),
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

<?php

namespace App\Filament\Resources\ServiceAnnouncements\Schemas;

use App\Enums\AnnouncementStatus;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ServiceAnnouncementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informações do Anúncio')
                    ->columns(2)
                    ->schema([
                        Select::make('service_id')
                            ->label('Serviço')
                            ->relationship('service', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        TextInput::make('title')
                            ->label('Título')
                            ->required()
                            ->maxLength(200),

                        Textarea::make('message')
                            ->label('Mensagem')
                            ->rows(3)
                            ->columnSpanFull(),

                        Select::make('status')
                            ->label('Estado')
                            ->options(AnnouncementStatus::class)
                            ->default('scheduled')
                            ->required(),
                    ]),

                Section::make('Datas')
                    ->columns(3)
                    ->schema([
                        DateTimePicker::make('opens_at')
                            ->label('Abre em'),

                        DateTimePicker::make('closes_at')
                            ->label('Fecha em'),

                        DateTimePicker::make('next_opening_at')
                            ->label('Próxima Abertura'),
                    ]),

                Section::make('Interno')
                    ->collapsed()
                    ->columns(2)
                    ->schema([
                        TextInput::make('internal_limit')
                            ->label('Limite Interno')
                            ->numeric(),

                        TextInput::make('internal_used')
                            ->label('Utilizado')
                            ->numeric()
                            ->default(0),

                        Textarea::make('internal_notes')
                            ->label('Notas Internas')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),

                Section::make('Configurações')
                    ->columns(2)
                    ->schema([
                        Toggle::make('show_countdown')
                            ->label('Mostrar Contagem Regressiva')
                            ->default(false),

                        Toggle::make('is_active')
                            ->label('Activo')
                            ->default(true),
                    ]),
            ]);
    }
}

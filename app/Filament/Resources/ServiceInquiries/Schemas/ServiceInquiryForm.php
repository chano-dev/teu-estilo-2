<?php

namespace App\Filament\Resources\ServiceInquiries\Schemas;

use App\Enums\InquiryStatus;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ServiceInquiryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Serviço')
                    ->columns(2)
                    ->schema([
                        Select::make('service_id')
                            ->label('Serviço')
                            ->relationship('service', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('user_id')
                            ->label('Utilizador')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload(),
                    ]),

                Section::make('Dados do Cliente')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('Nome')
                            ->required()
                            ->maxLength(100),

                        TextInput::make('phone')
                            ->label('Telefone')
                            ->tel()
                            ->required(),

                        TextInput::make('email')
                            ->label('Email')
                            ->email(),

                        Textarea::make('message')
                            ->label('Mensagem')
                            ->required()
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),

                Section::make('Imagens de Referência')
                    ->columns(2)
                    ->schema([
                        FileUpload::make('image_path')
                            ->label('Imagem 1')
                            ->image()
                            ->disk('public')
                            ->directory('service-inquiries'),

                        FileUpload::make('image_path_2')
                            ->label('Imagem 2')
                            ->image()
                            ->disk('public')
                            ->directory('service-inquiries'),
                    ]),

                Section::make('Orçamento')
                    ->columns(3)
                    ->schema([
                        TextInput::make('budget')
                            ->label('Orçamento')
                            ->numeric()
                            ->prefix('Kz'),

                        Textarea::make('shein_links')
                            ->label('Links Shein')
                            ->rows(2)
                            ->columnSpanFull(),

                        TextInput::make('shein_total_usd')
                            ->label('Total Shein (USD)')
                            ->numeric()
                            ->prefix('$'),

                        TextInput::make('estimated_total_aoa')
                            ->label('Total Estimado (AOA)')
                            ->numeric()
                            ->prefix('Kz'),
                    ]),

                Section::make('Gestão')
                    ->columns(2)
                    ->schema([
                        Select::make('status')
                            ->label('Estado')
                            ->options(InquiryStatus::class)
                            ->default('pending')
                            ->required(),

                        Toggle::make('whatsapp_sent')
                            ->label('WhatsApp Enviado')
                            ->default(false),

                        Textarea::make('admin_notes')
                            ->label('Notas do Admin')
                            ->rows(3)
                            ->columnSpanFull(),

                        DateTimePicker::make('contacted_at')
                            ->label('Contactado em'),

                        DateTimePicker::make('completed_at')
                            ->label('Concluído em'),
                    ]),
            ]);
    }
}

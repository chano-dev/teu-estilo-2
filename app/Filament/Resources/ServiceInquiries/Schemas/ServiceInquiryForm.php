<?php

namespace App\Filament\Resources\ServiceInquiries\Schemas;

use App\Enums\InquiryStatus;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ServiceInquiryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('service_id')
                    ->relationship('service', 'name')
                    ->required(),
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->default(null),
                TextInput::make('name')
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->default(null),
                Textarea::make('message')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('image_path')
                    ->image(),
                FileUpload::make('image_path_2')
                    ->image(),
                TextInput::make('budget')
                    ->numeric()
                    ->default(null),
                Textarea::make('shein_links')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('shein_total_usd')
                    ->numeric()
                    ->default(null),
                TextInput::make('estimated_total_aoa')
                    ->numeric()
                    ->default(null),
                Select::make('status')
                    ->options(InquiryStatus::class)
                    ->default('pending')
                    ->required(),
                Textarea::make('admin_notes')
                    ->default(null)
                    ->columnSpanFull(),
                Toggle::make('whatsapp_sent')
                    ->required(),
                DateTimePicker::make('contacted_at'),
                DateTimePicker::make('completed_at'),
            ]);
    }
}

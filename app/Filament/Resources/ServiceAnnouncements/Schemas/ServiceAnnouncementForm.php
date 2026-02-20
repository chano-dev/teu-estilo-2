<?php

namespace App\Filament\Resources\ServiceAnnouncements\Schemas;

use App\Enums\AnnouncementStatus;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ServiceAnnouncementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('service_id')
                    ->relationship('service', 'name')
                    ->required(),
                TextInput::make('title')
                    ->required(),
                Textarea::make('message')
                    ->default(null)
                    ->columnSpanFull(),
                Select::make('status')
                    ->options(AnnouncementStatus::class)
                    ->default('scheduled')
                    ->required(),
                DateTimePicker::make('opens_at'),
                DateTimePicker::make('closes_at'),
                DateTimePicker::make('next_opening_at'),
                TextInput::make('internal_limit')
                    ->numeric()
                    ->default(null),
                TextInput::make('internal_used')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                Textarea::make('internal_notes')
                    ->default(null)
                    ->columnSpanFull(),
                Toggle::make('show_countdown')
                    ->required(),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}

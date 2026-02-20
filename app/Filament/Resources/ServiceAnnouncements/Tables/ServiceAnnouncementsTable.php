<?php

namespace App\Filament\Resources\ServiceAnnouncements\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class ServiceAnnouncementsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('service.name')
                    ->label('Serviço')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('title')
                    ->label('Título')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Estado')
                    ->badge(),

                TextColumn::make('opens_at')
                    ->label('Abre em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),

                TextColumn::make('closes_at')
                    ->label('Fecha em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),

                TextColumn::make('internal_limit')
                    ->label('Limite')
                    ->numeric()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('internal_used')
                    ->label('Utilizado')
                    ->numeric()
                    ->toggleable(isToggledHiddenByDefault: true),

                IconColumn::make('show_countdown')
                    ->label('Contagem')
                    ->boolean(),

                IconColumn::make('is_active')
                    ->label('Activo')
                    ->boolean()
                    ->sortable(),

                TextColumn::make('updated_at')
                    ->label('Actualizado')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('opens_at', 'desc')
            ->filters([
                TernaryFilter::make('is_active')
                    ->label('Activo'),
                SelectFilter::make('status')
                    ->label('Estado')
                    ->options(\App\Enums\AnnouncementStatus::class),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

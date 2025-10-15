<?php

namespace App\Filament\Resources\ExploreCardSections\Tables;

use Filament\Actions\EditAction;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ExploreCardSectionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('subtitle_static')
                    ->label('Subtitle Prefix')
                    ->limit(40)
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('subtitle_dynamic')
                    ->label('Rotating Phrases')
                    ->formatStateUsing(fn ($state) => is_array($state) ? implode(', ', $state) : '-')
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('scale')
                    ->label('Scale')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                IconColumn::make('spin_clockwise')
                    ->label('Clockwise Spin')
                    ->boolean(),

                TextColumn::make('spin_speed')
                    ->label('Spin Speed')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->defaultSort('title')
            ->striped()
            ->recordActions([
                EditAction::make(),
            ]);
    }
}
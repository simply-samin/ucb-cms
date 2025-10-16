<?php

namespace App\Filament\Resources\ExploreCardSections\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ExploreCardSectionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('super_title')
                    ->label('Super Title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('title_static')
                    ->label('Title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('title_dynamic')
                    ->label('Rotating Phrases')
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('subtitle')
                    ->label('Subtitle')
                    ->limit(40)
                    ->sortable()
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
            ->defaultSort('title_static')
            ->striped()
            ->recordActions([
                EditAction::make(),
            ]);
    }
}
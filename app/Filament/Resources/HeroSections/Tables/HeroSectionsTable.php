<?php

namespace App\Filament\Resources\HeroSections\Tables;

use Filament\Actions\EditAction;
use Filament\Tables;
use Filament\Tables\Columns;
use Filament\Tables\Table;

class HeroSectionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Columns\TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),

                Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Columns\TextColumn::make('layout_type')
                    ->label('Layout Type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'carousel' => 'info',
                        'static' => 'success',
                        default => 'gray',
                    })
                    ->sortable(),

                Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),

                Columns\TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('layout_type')
                    ->label('Layout Type')
                    ->options([
                        'carousel' => 'Carousel',
                        'static' => 'Static',
                    ]),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active'),

            ])
            ->defaultSort('name')
            ->striped()
            ->recordActions([
                EditAction::make(),
            ]);
    }
}
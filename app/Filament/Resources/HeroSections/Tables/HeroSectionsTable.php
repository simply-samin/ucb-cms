<?php

namespace App\Filament\Resources\HeroSections\Tables;

use Filament\Actions\EditAction;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HeroSectionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('layout_type')
                        ->label('Layout Type')
                        ->badge()
                        ->color(fn (string $state): string => match ($state) {
                            'carousel' => 'info',
                            'static' => 'success',
                            default => 'gray',
                        })
                        ->sortable(),

                IconColumn::make('is_active')
                        ->label('Active')
                        ->boolean(),

                TextColumn::make('updated_at')
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
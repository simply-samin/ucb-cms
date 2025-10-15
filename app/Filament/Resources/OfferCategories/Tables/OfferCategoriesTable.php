<?php

namespace App\Filament\Resources\OfferCategories\Tables;

use Filament\Actions\EditAction;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OfferCategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('subtitle')
                    ->label('Subtitle')
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('offers_count')
                    ->label('Offers')
                    ->counts('offers')
                    ->badge(),

                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('title')
            ->striped()
            ->recordActions([
                EditAction::make(),
            ]);
    }
}
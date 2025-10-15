<?php

namespace App\Filament\Resources\Offers\Tables;

use Filament\Actions\EditAction;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OffersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('brand_image')
                    ->label('Brand')
                    ->square()
                    ->imageHeight(40),

                TextColumn::make('brand_name')
                    ->label('Brand Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('offer_category.title')
                    ->label('Category')
                    ->sortable(),

                TextColumn::make('offer_amount')
                    ->label('Offer Amount')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('title')
                    ->label('Title')
                    ->limit(40)
                    ->searchable()
                    ->sortable(),

                TextColumn::make('validity')
                    ->label('Validity')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('offer_category_id')
                    ->label('Category')
                    ->relationship('category', 'title'),
            ])
            ->defaultSort('brand_name')
            ->striped()
            ->recordActions([
                EditAction::make(),
            ]);
    }
}
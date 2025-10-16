<?php

namespace App\Filament\Resources\FeaturedOfferSections\Tables;

use Filament\Actions\EditAction;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FeaturedOfferSectionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title_prefix')
                    ->label('Title Prefix')
                    ->description(fn ($record) => $record->title_accent)
                    ->wrap()
                    ->sortable()
                    ->searchable(),

                TextColumn::make('title_accent')
                    ->label('Title Accent')
                    ->badge()
                    ->color('info')
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('categories_count')
                    ->counts('categories')
                    ->label('Linked Categories')
                    ->badge()
                    ->color('success'),

                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Example filter placeholder (add later if needed)
                Tables\Filters\SelectFilter::make('categories')
                    ->multiple()
                    ->relationship('categories', 'title')
            ])
            ->defaultSort('id', 'desc')
            ->striped()
            ->recordActions([
                EditAction::make(),
            ]);
    }
}
<?php

namespace App\Filament\Resources\LoungeSections\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class LoungeSectionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('media_path')
                    ->label('Media')
                    ->square()
                    ->imageHeight(50)
                    ->toggleable(),

                TextColumn::make('media_type')
                    ->label('Media Type')
                    ->badge()
                    ->color(fn (string|null $state): string => match ($state) {
                        'video' => 'info',
                        'image' => 'success',
                        default => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('super_title')
                    ->label('Super Title')
                    ->searchable()
                    ->limit(40)
                    ->sortable(),

                TextColumn::make('title')
                    ->label('Title')
                    ->limit(50)
                    ->searchable()
                    ->sortable(),

                TextColumn::make('subtitle')
                    ->label('Subtitle')
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('cta_label')
                    ->label('CTA Label')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('cta_link')
                    ->label('CTA Link')
                    ->limit(40)
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])

            ->filters([])

            ->defaultSort('id', 'desc')
            ->striped()
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                // BulkActionGroup::make([
                //     DeleteBulkAction::make(),
                // ]),
            ]);
    }
}
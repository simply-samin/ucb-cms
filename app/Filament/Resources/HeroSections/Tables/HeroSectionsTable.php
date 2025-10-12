<?php

namespace App\Filament\Resources\HeroSections\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables;
use Filament\Tables\Table;

class HeroSectionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('background_media')
                    ->label('Background')
                    ->disk('public')
                    ->square(),

                Tables\Columns\TextColumn::make('title')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('subtitle')
                    ->limit(40)
                    ->wrap(),

                Tables\Columns\TextColumn::make('background_type')
                    ->label('Type')
                    ->badge()
                    ->colors([
                        'primary' => 'image',
                        'warning' => 'video',
                    ]),

                Tables\Columns\TextColumn::make('order')
                    ->sortable()
                    ->label('Order')
                    ->alignCenter(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->since(),
            ])
            ->defaultSort('order')
            ->filters([])
            ->recordUrl(null)
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                CreateAction::make(),
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

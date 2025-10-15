<?php

namespace App\Filament\Resources\OfferCategories\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OfferCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->schema([
                TextInput::make('title')
                    ->label('Title')
                    ->maxLength(255)
                    ->required(),

                Textarea::make('subtitle')
                    ->label('Subtitle')
                    ->rows(2)
                    ->maxLength(500)
                    ->columnSpanFull(),
            ]);
    }
}
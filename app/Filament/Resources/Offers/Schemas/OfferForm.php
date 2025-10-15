<?php

namespace App\Filament\Resources\Offers\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OfferForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->schema([
                Select::make('offer_category_id')
                    ->label('Offer Category')
                    ->relationship('category', 'title')
                    ->required(),

                TextInput::make('brand_name')
                    ->label('Brand Name')
                    ->maxLength(255)
                    ->required(),

                FileUpload::make('brand_image')
                    ->label('Brand Image')
                    ->disk('public')
                    ->directory('offers/brands')
                    ->visibility('public')
                    ->image()
                    ->imagePreviewHeight('100px')
                    ->maxSize(2048)
                    ->columnSpanFull(),

                TextInput::make('offer_amount')
                    ->label('Offer Amount')
                    ->placeholder('e.g. 20% Off, BDT 500 Cashback')
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('title')
                    ->label('Title')
                    ->maxLength(255)
                    ->required(),

                TextInput::make('subtitle')
                    ->label('Subtitle')
                    ->maxLength(255)
                    ->columnSpanFull(),

                RichEditor::make('description')
                    ->label('Description')
                    ->columnSpanFull(),

                RichEditor::make('eligibility')
                    ->label('Eligibility')
                    ->columnSpanFull(),

                TextInput::make('validity')
                    ->label('Validity')
                    ->placeholder('e.g. Valid until Dec 31, 2025')
                    ->maxLength(255)
                    ->columnSpanFull(),
            ]);
    }
}
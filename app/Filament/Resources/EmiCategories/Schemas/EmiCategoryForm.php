<?php

namespace App\Filament\Resources\EmiCategories\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class EmiCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->schema([

                FileUpload::make('media_path')
                    ->label('Image')
                    ->helperText('Upload an image for the EMI category (Max: 1MB).')
                    ->disk('public')
                    ->directory('emi-categories')
                    ->visibility('public')
                    ->imagePreviewHeight('100px')
                    ->maxSize(1024)
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('super_title')
                    ->label('Super Title')
                    ->placeholder('e.g. Easy Payment Options')
                    ->maxLength(255),

                TextInput::make('title')
                    ->label('Title')
                    ->placeholder('e.g. Flexible EMI Plans')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                Textarea::make('subtitle')
                    ->label('Subtitle')
                    ->placeholder('e.g. Choose from flexible monthly payment options to fit your budget.')
                    ->maxLength(500)
                    ->rows(2)
                    ->columnSpanFull(),

                Toggle::make('is_active')
                    ->label('Active')
                    ->default(true)
                    ->columnSpanFull(),
            ]);
    }
}
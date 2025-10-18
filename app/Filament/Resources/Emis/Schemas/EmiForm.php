<?php

namespace App\Filament\Resources\Emis\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class EmiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->schema([

                Select::make('emi_category_id')
                    ->label('Category')
                    ->relationship('category', 'title')
                    ->searchable()
                    ->preload()
                    ->required(),

                FileUpload::make('media_path')
                    ->label('Image')
                    ->helperText('Upload an image for this EMI (Max: 1MB).')
                    ->disk('public')
                    ->directory('emis')
                    ->visibility('public')
                    ->image()
                    ->imagePreviewHeight('100px')
                    ->maxSize(2048)
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('super_title')
                    ->label('Super Title')
                    ->placeholder('e.g. Easy Payment Plans')
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('title')
                    ->label('Title')
                    ->placeholder('e.g. 0% Interest EMI')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('subtitle')
                    ->label('Subtitle')
                    ->placeholder('e.g. Flexible monthly installments available')
                    ->maxLength(255)
                    ->columnSpanFull(),

                RichEditor::make('description')
                    ->label('Description')
                    ->placeholder('Provide detailed information about the EMI offer.')
                    ->columnSpanFull(),

                RichEditor::make('address')
                    ->label('Address')
                    ->placeholder('Enter the location or branch address related to the EMI.')
                    ->columnSpanFull(),

                RichEditor::make('eligibility')
                    ->label('Eligibility')
                    ->placeholder('Specify who is eligible for this EMI offer.')
                    ->columnSpanFull(),

                TextInput::make('validity')
                    ->label('Validity')
                    ->placeholder('e.g. Valid until Dec 31, 2025')
                    ->maxLength(255)
                    ->columnSpanFull(),

                Toggle::make('is_active')
                    ->label('Active')
                    ->default(true)
                    ->columnSpanFull(),
            ]);
    }
}
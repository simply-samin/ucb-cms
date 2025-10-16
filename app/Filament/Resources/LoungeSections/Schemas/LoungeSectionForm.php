<?php

namespace App\Filament\Resources\LoungeSections\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;

class LoungeSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->schema([

                Grid::make(2)
                    ->schema([
                        Select::make('media_type')
                            ->label('Media Type')
                            ->options([
                                'image' => 'Image',
                                'video' => 'Video',
                            ])
                            ->default('image')
                            ->required()
                            ->live(),

                        FileUpload::make('media_path')
                            ->label('Media File')
                            ->helperText('Upload an image or video for the Lounge section (Max 2MB).')
                            ->disk('public')
                            ->directory('lounge')
                            ->visibility('public')
                            ->imagePreviewHeight('100px')
                            ->maxSize(2048)
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),

                TextInput::make('super_title')
                    ->label('Super Title')
                    ->placeholder('e.g. Relax. Refresh. Recharge.')
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('title')
                    ->label('Title')
                    ->placeholder('e.g. Welcome to The Lounge')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                Textarea::make('subtitle')
                    ->label('Subtitle')
                    ->placeholder('e.g. Your exclusive space to unwind and connect.')
                    ->maxLength(500)
                    ->rows(2)
                    ->columnSpanFull(),

                Grid::make(2)
                    ->schema([
                        TextInput::make('cta_label')
                            ->label('CTA Label')
                            ->placeholder('e.g. Explore Benefits')
                            ->maxLength(255),

                        TextInput::make('cta_link')
                            ->label('CTA Link')
                            ->placeholder('e.g. /lounge')
                            ->maxLength(255),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
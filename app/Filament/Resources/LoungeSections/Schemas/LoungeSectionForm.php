<?php

namespace App\Filament\Resources\LoungeSections\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class LoungeSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->schema([

                Select::make('media_type')
                    ->label('Media Type')
                    ->options([
                        'image' => 'Image',
                        'video' => 'Video',
                    ])
                    ->required()
                    ->live(),

                FileUpload::make('upload_path')
                    ->label('Image')
                    ->helperText('Upload the hero background image (Max: 1MB).')
                    ->disk('public')
                    ->directory('lounge')
                    ->visibility('public')
                    ->image()
                    ->imagePreviewHeight('100px')
                    ->maxSize(1024)
                    ->required(fn (Get $get) => $get('media_type') === 'image')
                    ->visible(fn (Get $get) => $get('media_type') === 'image')
                    ->columnSpanFull(),

                TextInput::make('video_url')
                    ->label('Video URL')
                    ->placeholder('https://example.com/video.mp4')
                    ->required(fn (Get $get) => $get('media_type') === 'video')
                    ->visible(fn (Get $get) => $get('media_type') === 'video')
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
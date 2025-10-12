<?php

namespace App\Filament\Resources\HeroSections\Schemas;

use Filament\Forms;

use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HeroSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Section::make('Content')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Title')
                        ->maxLength(255)
                        ->required()
                        ->columnSpanFull(),

                    Forms\Components\TextInput::make('subtitle')
                        ->label('Subtitle')
                        ->maxLength(255)
                        ->columnSpanFull(),

                    Grid::make(2)
                        ->schema([
                            Forms\Components\TextInput::make('cta_label')
                                ->label('CTA Button Text')
                                ->maxLength(255),

                            Forms\Components\TextInput::make('cta_link')
                                ->label('CTA Link')
                                ->maxLength(255)
                                ->url(),
                        ]),
                ])
                ->columns(2),

            Section::make('Background')
                ->schema([
                    Forms\Components\Select::make('background_type')
                        ->label('Background Type')
                        ->options([
                            'image' => 'Image',
                            'video' => 'Video',
                        ])
                        ->default('image')
                        ->live()
                        ->required(),

                    Forms\Components\FileUpload::make('background_media')
                        ->label('Background Media')
                        ->directory('hero')
                        ->disk('public')
                        ->visibility('public')
                        ->imageEditor()
                        ->imagePreviewHeight('160')
                        ->openable()
                        ->downloadable()
                        ->columnSpanFull(),
                ])
                ->columns(2),

            Section::make('Settings')
                ->schema([
                    Forms\Components\Select::make('text_alignment')
                        ->label('Text Alignment')
                        ->options([
                            'left' => 'Left',
                            'center' => 'Center',
                            'right' => 'Right',
                        ])
                        ->default('center')
                        ->required(),

                    Forms\Components\TextInput::make('order')
                        ->label('Display Order')
                        ->numeric()
                        ->default(0)
                        ->minValue(0),
                ])
                ->columns(2),
        ]);
    }
}
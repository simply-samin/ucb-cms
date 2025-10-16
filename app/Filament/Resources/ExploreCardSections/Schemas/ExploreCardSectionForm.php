<?php

namespace App\Filament\Resources\ExploreCardSections\Schemas;

use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class ExploreCardSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->schema([
                TextInput::make('super_title')
                    ->label('Super Title')
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('title_static')
                    ->label('Title')
                    ->maxLength(255)
                    ->required(),

                TagsInput::make('title_dynamic')
                    ->label('Rotating Phrases')
                    ->placeholder('e.g. "exciting adventures", "lasting memories"')
                    ->helperText('These phrases will rotate dynamically after the title.')
                    ->reorderable()
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('subtitle')
                    ->label('Subtitle')
                    ->maxLength(255)
                    ->columnSpanFull(),

                FileUpload::make('media_path')
                    ->label('Image')
                    ->helperText('Upload an image (Max: 2MB).')
                    ->disk('public')
                    ->directory('explore')
                    ->visibility('public')
                    ->image()
                    ->imagePreviewHeight('100px')
                    ->maxSize(2048)
                    ->required()
                    ->columnSpanFull(),

                Fieldset::make('Animation')
                    ->schema([
                        TextInput::make('scale')
                            ->label('Scale (Zoom Level)')
                            ->numeric()
                            ->default(1.0)
                            ->step(0.1),

                        Toggle::make('spin_clockwise')
                            ->label('Spin Clockwise')
                            ->inline(false)
                            ->default(true),

                        TextInput::make('spin_speed')
                            ->label('Spin Speed')
                            ->numeric()
                            ->default(1.0)
                            ->step(0.1),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),

                Grid::make(2)
                    ->schema([
                        TextInput::make('cta_primary_label')
                            ->label('Primary CTA Label')
                            ->maxLength(255),

                        TextInput::make('cta_primary_link')
                            ->label('Primary CTA Link')
                            ->maxLength(255),
                    ])
                    ->columnSpanFull(),

                Grid::make(2)
                    ->schema([
                        TextInput::make('cta_secondary_label')
                            ->label('Secondary CTA Label')
                            ->maxLength(255),

                        TextInput::make('cta_secondary_link')
                            ->label('Secondary CTA Link')
                            ->maxLength(255),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
<?php

namespace App\Filament\Resources\ExploreCardSections\Schemas;

use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class ExploreCardSectionForm
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

                TextInput::make('subtitle_static')
                    ->label('Static Subtitle Prefix')
                    ->maxLength(255)
                    ->required()
                    ->columnSpanFull(),

                Repeater::make('subtitle_dynamic')
                    ->label('Rotating Subtitle Phrases')
                    ->helperText('These phrases will cycle dynamically after the static subtitle part (e.g., “unforgettable moments”, “lasting memories”).')
                    ->schema([
                        TextInput::make('value')
                            ->label('Phrase')
                            ->placeholder('e.g. unforgettable moments')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->addActionLabel('Add Phrase')
                    ->minItems(1)
                    ->required()
                    ->reorderable()
                    ->deleteAction(fn (Action $action, Get $get) =>
                        $action->visible(fn () => count($get('subtitle_dynamic') ?? []) > 1)
                    )
                    ->columnSpanFull(),

                FileUpload::make('media_path')
                    ->label('Image')
                    ->helperText('Upload image (max: 2MB).')
                    ->disk('public')
                    ->directory('explore')
                    ->visibility('public')
                    ->image()
                    ->imagePreviewHeight('100px')
                    ->maxSize(2048)
                    ->required()
                    ->columnSpanFull(),

                Grid::make(3)
                    ->schema([
                        TextInput::make('scale')
                            ->label('Scale (Zoom Level)')
                            ->helperText('Controls how much the background image is zoomed in or out. Default is 1.0 (no zoom).')
                            ->numeric()
                            ->default(1.0)
                            ->step(0.1),

                        Toggle::make('spin_clockwise')
                            ->label('Spin Clockwise')
                            ->helperText('When enabled, the image rotates clockwise. Turn off for anti-clockwise rotation.')
                            ->inline(false)
                            ->default(true),

                        TextInput::make('spin_speed')
                            ->label('Spin Speed')
                            ->helperText('Adjust the rotation speed. Lower values make the spin slower, higher values make it faster.')
                            ->numeric()
                            ->default(1.0)
                            ->step(0.1),
                    ])
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
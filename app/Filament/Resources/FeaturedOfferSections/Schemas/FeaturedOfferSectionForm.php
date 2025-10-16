<?php

namespace App\Filament\Resources\FeaturedOfferSections\Schemas;

use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class FeaturedOfferSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->schema([

                TextInput::make('title_prefix')
                    ->label('Title Prefix')
                    ->placeholder('e.g. Experiences')
                    ->required()
                    ->maxLength(255),

                TextInput::make('title_accent')
                    ->label('Title Accent (Styled Part)')
                    ->placeholder('e.g. Beyond the Ordinary')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                Repeater::make('categories')
                    ->label('Featured Categories')
                    ->relationship('categories')
                    ->orderColumn('sort')
                    ->minItems(4)
                    ->defaultItems(4)
                    ->collapsible()
                    ->mutateRelationshipDataBeforeSaveUsing(function (array $data): array {
                        $data['media_type'] = 'image';

                        return $data;
                    })
                    ->deleteAction(fn (Action $action, Get $get) =>
                        $action->visible(fn () => count($get('categories') ?? []) > 4)
                    )
                    ->schema([

                        Grid::make(2)
                            ->schema([

                                Select::make('offer_category_id')
                                    ->label('Offer Category')
                                    ->relationship('category', 'title')
                                    ->required()
                                    ->searchable()
                                    ->preload()
                                    ->columnSpanFull(),

                                TextInput::make('super_title')
                                    ->label('Super Title')
                                    ->placeholder('e.g. Featured')
                                    ->maxLength(255),

                                TextInput::make('title')
                                    ->label('Title')
                                    ->placeholder('e.g. Dine & Save')
                                    ->maxLength(255),

                                TextInput::make('subtitle')
                                    ->label('Subtitle')
                                    ->placeholder('e.g. Exclusive dining offers')
                                    ->maxLength(255),
                            ])
                            ->columnSpanFull(),

                        FileUpload::make('media_image')
                            ->label('Image')
                            ->helperText('Upload an image for this category (Max: 1MB).')
                            ->disk('public')
                            ->directory('featured-offers')
                            ->visibility('public')
                            ->image()
                            ->imagePreviewHeight('100px')
                            ->maxSize(1024)
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),


            ]);
    }
}
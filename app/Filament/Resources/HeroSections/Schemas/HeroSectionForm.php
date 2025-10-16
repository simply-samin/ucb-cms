<?php

namespace App\Filament\Resources\HeroSections\Schemas;

use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class HeroSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->schema([
                TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function ($state, Set $set, string $operation) {
                        if ($operation === 'create' && filled($state)) {
                            $set('slug', Str::slug($state));
                        }
                    })
                    ->partiallyRenderComponentsAfterStateUpdated(['slug']),

                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255)
                    ->disabled(),

                Select::make('layout_type')
                    ->label('Layout Type')
                    ->options([
                        'carousel' => 'Carousel',
                        'static' => 'Static',
                    ])
                    ->default('static')
                    ->selectablePlaceholder(false)
                    ->required()
                    ->live()
                    ->afterStateUpdated(function ($state, Get $get, Set $set) {
                        $contents = $get('contents') ?? [];

                        if ($state === 'static' && count($contents) > 1) {
                            $set('layout_type', 'carousel');

                            Notification::make()
                                ->warning()
                                ->title('Cannot switch to Static layout')
                                ->body('To switch to Static, only one hero content is allowed. Please remove extra contents before changing the layout type.')
                                ->persistent()
                                ->send();
                        }
                    }),

                Toggle::make('is_active')
                    ->label('Active')
                    ->default(true)
                    ->inline(false),

                Repeater::make('contents')
                    ->label('Contents')
                    ->relationship('contents')
                    ->mutateRelationshipDataBeforeSaveUsing(function (array $data): array {
                        if ($data['media_type'] === 'image') {
                            $data['media_path'] = $data['upload_path'] ?? null;
                        } elseif ($data['media_type'] === 'video') {
                            $data['media_path'] = $data['video_url'] ?? null;
                        }

                        unset($data['upload_path'], $data['video_url']);

                        return $data;
                    })
                    ->mutateRelationshipDataBeforeFillUsing(function (array $data): array {
                        if ($data['media_type'] === 'image') {
                            $data['upload_path'] = $data['media_path'];
                        } elseif ($data['media_type'] === 'video') {
                            $data['video_url'] = $data['media_path'];
                        }

                        return $data;
                    })
                    ->orderColumn()
                    ->required()
                    ->minItems(1)
                    ->maxItems(fn (Get $get) => $get('layout_type') === 'static' ? 1 : null)
                    ->reorderable(fn (Get $get) => $get('layout_type') === 'carousel')
                    ->deleteAction(fn (Action $action, Get $get) =>
                        $action->visible(fn () => count($get('contents') ?? []) > 1)
                    )
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('media_type')
                                    ->label('Media Type')
                                    ->options([
                                        'image' => 'Image',
                                        'video' => 'Video',
                                    ])
                                    ->required()
                                    ->live(),

                                Toggle::make('is_active')
                                    ->label('Active')
                                    ->default(true)
                                    ->inline(false),
                            ]),

                        Grid::make(2)
                            ->schema([
                                FileUpload::make('upload_path')
                                    ->label('Image')
                                    ->helperText('Upload the hero background image (max 5MB).')
                                    ->disk('public')
                                    ->directory('hero')
                                    ->visibility('public')
                                    ->image()
                                    ->imagePreviewHeight('100px')
                                    ->maxSize(5120)
                                    ->required(fn (Get $get) => $get('media_type') === 'image')
                                    ->visible(fn (Get $get) => $get('media_type') === 'image'),

                                TextInput::make('video_url')
                                    ->label('Video URL')
                                    ->placeholder('https://example.com/video.mp4')
                                    ->required(fn (Get $get) => $get('media_type') === 'video')
                                    ->visible(fn (Get $get) => $get('media_type') === 'video'),
                            ]),


                        TextInput::make('super_title')
                            ->label('Super Title')
                            ->maxLength(255),

                        TextInput::make('title')
                            ->label('Title')
                            ->maxLength(255),

                        Textarea::make('subtitle')
                            ->label('Subtitle')
                            ->maxLength(500),

                        Grid::make(2)
                            ->schema([
                                TextInput::make('cta_label')
                                    ->label('CTA Label')
                                    ->maxLength(255),

                                TextInput::make('cta_link')
                                    ->label('CTA Link')
                                    ->maxLength(255),
                            ]),
                    ])
                    ->columns(1)
                    ->columnSpanFull(),


            ]);
    }
}
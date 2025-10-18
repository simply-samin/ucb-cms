<?php

namespace App\Filament\Resources\OfferCategories\RelationManagers;

use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OffersRelationManager extends RelationManager
{
    protected static string $relationship = 'offers';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([

                FileUpload::make('media_path')
                    ->label('Image')
                    ->helperText('Upload an image for this Offer (Max: 1MB).')
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
                    ->placeholder('Provide detailed information about the offer.')
                    ->columnSpanFull(),

                RichEditor::make('address')
                    ->label('Address')
                    ->placeholder('Enter the location or branch address related to the offer.')
                    ->columnSpanFull(),

                RichEditor::make('eligibility')
                    ->label('Eligibility')
                    ->placeholder('Specify who is eligible for this offer.')
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

    public function table(Table $table): Table
    {
        return $table
            ->inverseRelationship('category')
            ->recordTitleAttribute('title')
            ->columns([
                ImageColumn::make('media_path')
                    ->label('Image')
                    ->square()
                    ->imageHeight(40),

                TextColumn::make('category.title')
                    ->label('Category')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('super_title')
                    ->label('Super Title')
                    ->limit(40)
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('title')
                    ->label('Title')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('subtitle')
                    ->label('Subtitle')
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('address')
                    ->label('Address')
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('eligibility')
                    ->label('Eligibility')
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('validity')
                    ->label('Validity')
                    ->limit(40)
                    ->toggleable(isToggledHiddenByDefault: true),

                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),

                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('title')
            ->headerActions([
                CreateAction::make(),
                AssociateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DissociateAction::make(),
                // DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DissociateBulkAction::make(),
                    // DeleteBulkAction::make(),
                ]),
            ]);
    }
}

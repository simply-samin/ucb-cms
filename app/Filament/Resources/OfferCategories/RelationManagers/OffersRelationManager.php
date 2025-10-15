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
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
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
                TextInput::make('brand_name')
                    ->label('Brand Name')
                    ->maxLength(255)
                    ->required(),

                FileUpload::make('brand_image')
                    ->label('Brand Image')
                    ->disk('public')
                    ->directory('offers/brands')
                    ->visibility('public')
                    ->image()
                    ->imagePreviewHeight('100px')
                    ->maxSize(2048)
                    ->columnSpanFull(),

                TextInput::make('offer_amount')
                    ->label('Offer Amount')
                    ->maxLength(255),

                TextInput::make('title')
                    ->label('Title')
                    ->maxLength(255)
                    ->required(),

                Textarea::make('subtitle')
                    ->label('Subtitle')
                    ->maxLength(255),

                Textarea::make('description')
                    ->label('Description')
                    ->rows(3),

                Textarea::make('eligibility')
                    ->label('Eligibility')
                    ->rows(2),

                TextInput::make('validity')
                    ->label('Validity')
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->inverseRelationship('category')
            ->recordTitleAttribute('title')
            ->columns([
                ImageColumn::make('brand_image')
                    ->label('Brand')
                    ->square()
                    ->imageHeight(40),

                TextColumn::make('brand_name')
                    ->label('Brand Name')
                    ->sortable(),

                TextColumn::make('offer_amount')
                    ->label('Amount')
                    ->sortable(),

                TextColumn::make('title')
                    ->label('Title')
                    ->limit(40)
                    ->searchable(),

                TextColumn::make('validity')
                    ->label('Validity')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->defaultSort('brand_name')
            ->headerActions([
                CreateAction::make(),
                AssociateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DissociateAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DissociateBulkAction::make(),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

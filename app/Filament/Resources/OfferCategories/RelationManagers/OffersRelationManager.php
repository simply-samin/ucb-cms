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
                    ->maxSize(1024)
                    ->helperText('Upload the brand image (max 1MB).')
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

                Grid::make(2)
                    ->schema([
                        TextInput::make('offer_amount')
                            ->label('Offer Amount')
                            ->maxLength(255),

                        TextInput::make('minimum_order')
                            ->label('Minimum Order')
                            ->maxLength(255),
                    ])
                    ->columnSpanFull(),

                TextInput::make('cash_back_limit')
                    ->label('Cashback Limit')
                    ->maxLength(255)
                    ->columnSpanFull(),

                Textarea::make('description')
                    ->label('Description')
                    ->rows(3)
                    ->columnSpanFull(),

                Textarea::make('eligibility')
                    ->label('Eligibility')
                    ->rows(2)
                    ->columnSpanFull(),

                TextInput::make('validity')
                    ->label('Validity')
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
                ImageColumn::make('brand_image')
                    ->label('Brand')
                    ->square()
                    ->imageHeight(40),

                TextColumn::make('brand_name')
                    ->label('Brand Name')
                    ->sortable(),

                TextColumn::make('super_title')
                    ->label('Super Title')
                    ->limit(40)
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('title')
                    ->label('Title')
                    ->limit(40)
                    ->searchable(),

                TextColumn::make('offer_amount')
                    ->label('Offer Amount')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('minimum_order')
                    ->label('Minimum Order')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('cash_back_limit')
                    ->label('Cashback Limit')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('validity')
                    ->label('Validity')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),
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

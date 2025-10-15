<?php

namespace App\Filament\Resources\OfferCategories;

use App\Filament\Resources\OfferCategories\Pages\CreateOfferCategory;
use App\Filament\Resources\OfferCategories\Pages\EditOfferCategory;
use App\Filament\Resources\OfferCategories\Pages\ListOfferCategories;
use App\Filament\Resources\OfferCategories\Schemas\OfferCategoryForm;
use App\Filament\Resources\OfferCategories\Tables\OfferCategoriesTable;
use App\Filament\Resources\OfferCategories\RelationManagers\OffersRelationManager;
use App\Models\OfferCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class OfferCategoryResource extends Resource
{
    protected static ?string $model = OfferCategory::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedSquares2x2;

    protected static ?string $navigationLabel = 'Offer Categories';

    protected static string | UnitEnum | null $navigationGroup = 'Content';

    public static function form(Schema $schema): Schema
    {
        return OfferCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OfferCategoriesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            OffersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListOfferCategories::route('/'),
            'create' => CreateOfferCategory::route('/create'),
            'edit'   => EditOfferCategory::route('/{record}/edit'),
        ];
    }
}
<?php

namespace App\Filament\Resources\FeaturedOfferSections;

use App\Filament\Resources\FeaturedOfferSections\Pages\CreateFeaturedOfferSection;
use App\Filament\Resources\FeaturedOfferSections\Pages\EditFeaturedOfferSection;
use App\Filament\Resources\FeaturedOfferSections\Pages\ListFeaturedOfferSections;
use App\Filament\Resources\FeaturedOfferSections\Schemas\FeaturedOfferSectionForm;
use App\Filament\Resources\FeaturedOfferSections\Tables\FeaturedOfferSectionsTable;
use App\Models\FeaturedOfferSection;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class FeaturedOfferSectionResource extends Resource
{
    protected static ?string $model = FeaturedOfferSection::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedGiftTop;

    protected static string | UnitEnum | null $navigationGroup = 'Sections';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return FeaturedOfferSectionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FeaturedOfferSectionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFeaturedOfferSections::route('/'),
            'create' => CreateFeaturedOfferSection::route('/create'),
            'edit' => EditFeaturedOfferSection::route('/{record}/edit'),
        ];
    }
}

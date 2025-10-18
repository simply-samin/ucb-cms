<?php

namespace App\Filament\Resources\ExploreCardSections;

use App\Filament\Resources\ExploreCardSections\Pages\CreateExploreCardSection;
use App\Filament\Resources\ExploreCardSections\Pages\EditExploreCardSection;
use App\Filament\Resources\ExploreCardSections\Pages\ListExploreCardSections;
use App\Filament\Resources\ExploreCardSections\Schemas\ExploreCardSectionForm;
use App\Filament\Resources\ExploreCardSections\Tables\ExploreCardSectionsTable;
use App\Models\ExploreCardSection;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ExploreCardSectionResource extends Resource
{
    protected static ?string $model = ExploreCardSection::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedSquares2x2;

    protected static ?string $navigationLabel = 'Explore Card Sections';

    protected static string | UnitEnum | null $navigationGroup = 'Sections';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return ExploreCardSectionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ExploreCardSectionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListExploreCardSections::route('/'),
            'create' => CreateExploreCardSection::route('/create'),
            'edit'   => EditExploreCardSection::route('/{record}/edit'),
        ];
    }
}
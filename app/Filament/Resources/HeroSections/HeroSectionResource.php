<?php

namespace App\Filament\Resources\HeroSections;

use BackedEnum;
use App\Filament\Resources\HeroSections\Pages\CreateHeroSection;
use App\Filament\Resources\HeroSections\Pages\EditHeroSection;
use App\Filament\Resources\HeroSections\Pages\ListHeroSections;
use App\Filament\Resources\HeroSections\Schemas\HeroSectionForm;
use App\Filament\Resources\HeroSections\Tables\HeroSectionsTable;
use App\Models\HeroSection;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class HeroSectionResource extends Resource
{
    protected static ?string $model = HeroSection::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedPhoto;

    protected static ?string $navigationLabel = 'Hero Sections';

    protected static string | UnitEnum | null $navigationGroup = 'Sections';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return HeroSectionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HeroSectionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            // ContentsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListHeroSections::route('/'),
            'create' => CreateHeroSection::route('/create'),
            'edit'   => EditHeroSection::route('/{record}/edit'),
        ];
    }

}
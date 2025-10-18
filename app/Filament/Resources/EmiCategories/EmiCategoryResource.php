<?php

namespace App\Filament\Resources\EmiCategories;

use App\Filament\Resources\EmiCategories\Pages\CreateEmiCategory;
use App\Filament\Resources\EmiCategories\Pages\EditEmiCategory;
use App\Filament\Resources\EmiCategories\Pages\ListEmiCategories;
use App\Filament\Resources\EmiCategories\Schemas\EmiCategoryForm;
use App\Filament\Resources\EmiCategories\Tables\EmiCategoriesTable;
use App\Models\EmiCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class EmiCategoryResource extends Resource
{
    protected static ?string $model = EmiCategory::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedSquares2x2;

    protected static string | UnitEnum | null $navigationGroup = 'Content';

    public static function form(Schema $schema): Schema
    {
        return EmiCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EmiCategoriesTable::configure($table);
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
            'index' => ListEmiCategories::route('/'),
            'create' => CreateEmiCategory::route('/create'),
            'edit' => EditEmiCategory::route('/{record}/edit'),
        ];
    }
}

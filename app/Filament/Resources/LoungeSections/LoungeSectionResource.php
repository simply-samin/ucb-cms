<?php

namespace App\Filament\Resources\LoungeSections;

use App\Filament\Resources\LoungeSections\Pages\CreateLoungeSection;
use App\Filament\Resources\LoungeSections\Pages\EditLoungeSection;
use App\Filament\Resources\LoungeSections\Pages\ListLoungeSections;
use App\Filament\Resources\LoungeSections\Schemas\LoungeSectionForm;
use App\Filament\Resources\LoungeSections\Tables\LoungeSectionsTable;
use App\Models\LoungeSection;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class LoungeSectionResource extends Resource
{
    protected static ?string $model = LoungeSection::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedHomeModern;

    protected static string | UnitEnum | null $navigationGroup = 'Sections';

    protected static ?int $navigationSort = 5;

    public static function form(Schema $schema): Schema
    {
        return LoungeSectionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LoungeSectionsTable::configure($table);
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
            'index' => ListLoungeSections::route('/'),
            'create' => CreateLoungeSection::route('/create'),
            'edit' => EditLoungeSection::route('/{record}/edit'),
        ];
    }
}

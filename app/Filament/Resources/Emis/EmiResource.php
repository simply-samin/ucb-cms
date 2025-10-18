<?php

namespace App\Filament\Resources\Emis;

use App\Filament\Resources\Emis\Pages\CreateEmi;
use App\Filament\Resources\Emis\Pages\EditEmi;
use App\Filament\Resources\Emis\Pages\ListEmis;
use App\Filament\Resources\Emis\Schemas\EmiForm;
use App\Filament\Resources\Emis\Tables\EmisTable;
use App\Models\Emi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class EmiResource extends Resource
{
    protected static ?string $model = Emi::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedBanknotes;

    protected static string | UnitEnum | null $navigationGroup = 'Content';

    public static function form(Schema $schema): Schema
    {
        return EmiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EmisTable::configure($table);
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
            'index' => ListEmis::route('/'),
            'create' => CreateEmi::route('/create'),
            'edit' => EditEmi::route('/{record}/edit'),
        ];
    }
}

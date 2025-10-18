<?php

namespace App\Filament\Resources\PartnerSections;

use App\Filament\Resources\PartnerSections\Pages\ManagePartnerSections;
use App\Models\PartnerSection;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class PartnerSectionResource extends Resource
{
    protected static ?string $model = PartnerSection::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedBuildingOffice;

    protected static string | UnitEnum | null $navigationGroup = 'Sections';

    protected static ?int $navigationSort = 6;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->schema([
                TextInput::make('super_title')
                    ->label('Super Title')
                    ->placeholder('e.g. In Collaboration With')
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('title_static')
                    ->label('Title')
                    ->placeholder('e.g. Our Trusted')
                    ->maxLength(255)
                    ->required(),

                TagsInput::make('title_dynamic')
                    ->label('Rotating Phrases')
                    ->placeholder('e.g. "Partners", "Sponsors"')
                    ->helperText('These phrases will rotate dynamically after the title. ')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('super_title')
                    ->label('Super Title')
                    ->limit(40)
                    ->searchable()
                    ->sortable(),

                TextColumn::make('title_static')
                    ->label('Title')
                    ->limit(40)
                    ->sortable()
                    ->searchable(),

                TextColumn::make('title_dynamic')
                    ->label('Rotating Phrases')
                    ->limit(50)
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->defaultSort('id', 'desc')
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                // BulkActionGroup::make([
                //     DeleteBulkAction::make(),
                // ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManagePartnerSections::route('/'),
        ];
    }
}
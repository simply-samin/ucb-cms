<?php

namespace App\Filament\Resources\OffersDealsSections;

use App\Filament\Resources\OffersDealsSections\Pages\ManageOffersDealsSections;
use App\Models\OffersDealsSection;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class OffersDealsSectionResource extends Resource
{
    protected static ?string $model = OffersDealsSection::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedTag;

    protected static ?string $navigationLabel = 'Offers & Deals Sections';

    protected static string | UnitEnum | null $navigationGroup = 'Sections';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->schema([
                TextInput::make('super_title')
                    ->label('Super Title')
                    ->placeholder('e.g. Discover Exclusive Offers')
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('title_static')
                    ->label('Title')
                    ->placeholder('e.g. Unbeatable')
                    ->maxLength(255)
                    ->required(),

                TagsInput::make('title_dynamic')
                    ->label('Rotating Phrases')
                    ->placeholder('e.g. "Deals", "Discounts", "Rewards"')
                    ->helperText('These phrases will rotate dynamically after the title.')
                    ->columnSpanFull(),

                Toggle::make('is_active')
                    ->label('Active')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('super_title')
                    ->label('Super Title')
                    ->limit(40)
                    ->sortable()
                    ->searchable(),

                TextColumn::make('title_static')
                    ->label('Title')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('title_dynamic')
                    ->label('Rotating Phrases')
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),

                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean()
                    ->sortable(),

                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->defaultSort('title_static')
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageOffersDealsSections::route('/'),
        ];
    }
}
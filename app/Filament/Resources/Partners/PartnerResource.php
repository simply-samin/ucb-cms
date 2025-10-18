<?php

namespace App\Filament\Resources\Partners;

use App\Filament\Resources\Partners\Pages\ManagePartners;
use App\Models\Partner;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class PartnerResource extends Resource
{
    protected static ?string $model = Partner::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedPuzzlePiece;

    protected static string | UnitEnum | null $navigationGroup = 'Content';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->schema([

                TextInput::make('brand_name')
                    ->label('Brand Name')
                    ->placeholder('e.g. Visa')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                FileUpload::make('brand_image')
                    ->label('Brand Logo')
                    ->disk('public')
                    ->directory('partners')
                    ->visibility('public')
                    ->helperText('Upload the partner’s logo image (Max: 1MB).')
                    ->image()
                    ->imagePreviewHeight('100px')
                    ->maxSize(1024)
                    ->columnSpanFull(),

                TextInput::make('brand_link')
                    ->label('Brand Website')
                    ->placeholder('https://example.com')
                    ->maxLength(255)
                    ->columnSpanFull(),

                Textarea::make('description')
                    ->label('Description')
                    ->placeholder('Short description or note about the partner.')
                    ->rows(2)
                    ->maxLength(500)
                    ->columnSpanFull(),

                TextInput::make('sort')
                    ->label('Sort Order')
                    ->numeric()
                    ->default(0)
                    ->minValue(0),

                Toggle::make('is_active')
                    ->label('Active')
                    ->inline(false)
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('brand_image')
                    ->label('Logo')
                    ->square()
                    ->imageHeight(50)
                    ->toggleable(),

                TextColumn::make('brand_name')
                    ->label('Brand Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('brand_link')
                    ->label('Brand Link')
                    ->limit(40)
                    ->toggleable(isToggledHiddenByDefault: true),

                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean()
                    ->sortable(),

                TextColumn::make('sort')
                    ->label('Sort')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->defaultSort('sort')
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
            'index' => ManagePartners::route('/'),
        ];
    }
}
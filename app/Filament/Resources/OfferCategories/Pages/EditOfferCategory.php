<?php

namespace App\Filament\Resources\OfferCategories\Pages;

use App\Filament\Resources\OfferCategories\OfferCategoryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditOfferCategory extends EditRecord
{
    protected static string $resource = OfferCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

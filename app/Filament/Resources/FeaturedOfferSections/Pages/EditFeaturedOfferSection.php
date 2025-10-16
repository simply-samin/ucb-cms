<?php

namespace App\Filament\Resources\FeaturedOfferSections\Pages;

use App\Filament\Resources\FeaturedOfferSections\FeaturedOfferSectionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFeaturedOfferSection extends EditRecord
{
    protected static string $resource = FeaturedOfferSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

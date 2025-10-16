<?php

namespace App\Filament\Resources\FeaturedOfferSections\Pages;

use App\Filament\Resources\FeaturedOfferSections\FeaturedOfferSectionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFeaturedOfferSections extends ListRecords
{
    protected static string $resource = FeaturedOfferSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

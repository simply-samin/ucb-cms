<?php

namespace App\Filament\Resources\OffersDealsSections\Pages;

use App\Filament\Resources\OffersDealsSections\OffersDealsSectionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageOffersDealsSections extends ManageRecords
{
    protected static string $resource = OffersDealsSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

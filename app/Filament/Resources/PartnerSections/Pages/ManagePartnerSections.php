<?php

namespace App\Filament\Resources\PartnerSections\Pages;

use App\Filament\Resources\PartnerSections\PartnerSectionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManagePartnerSections extends ManageRecords
{
    protected static string $resource = PartnerSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

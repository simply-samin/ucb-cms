<?php

namespace App\Filament\Resources\EmiSections\Pages;

use App\Filament\Resources\EmiSections\EmiSectionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageEmiSections extends ManageRecords
{
    protected static string $resource = EmiSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\ExploreCardSections\Pages;

use App\Filament\Resources\ExploreCardSections\ExploreCardSectionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListExploreCardSections extends ListRecords
{
    protected static string $resource = ExploreCardSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

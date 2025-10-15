<?php

namespace App\Filament\Resources\ExploreCardSections\Pages;

use App\Filament\Resources\ExploreCardSections\ExploreCardSectionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditExploreCardSection extends EditRecord
{
    protected static string $resource = ExploreCardSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\LoungeSections\Pages;

use App\Filament\Resources\LoungeSections\LoungeSectionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLoungeSections extends ListRecords
{
    protected static string $resource = LoungeSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

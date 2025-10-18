<?php

namespace App\Filament\Resources\EmiCategories\Pages;

use App\Filament\Resources\EmiCategories\EmiCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEmiCategories extends ListRecords
{
    protected static string $resource = EmiCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

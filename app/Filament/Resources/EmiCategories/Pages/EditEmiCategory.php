<?php

namespace App\Filament\Resources\EmiCategories\Pages;

use App\Filament\Resources\EmiCategories\EmiCategoryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditEmiCategory extends EditRecord
{
    protected static string $resource = EmiCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\LoungeSections\Pages;

use App\Filament\Resources\LoungeSections\LoungeSectionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLoungeSection extends EditRecord
{
    protected static string $resource = LoungeSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

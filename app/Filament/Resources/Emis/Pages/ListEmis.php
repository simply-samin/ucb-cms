<?php

namespace App\Filament\Resources\Emis\Pages;

use App\Filament\Resources\Emis\EmiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEmis extends ListRecords
{
    protected static string $resource = EmiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

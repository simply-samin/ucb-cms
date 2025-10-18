<?php

namespace App\Filament\Resources\Emis\Pages;

use App\Filament\Resources\Emis\EmiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditEmi extends EditRecord
{
    protected static string $resource = EmiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['media_type'] = 'image';
        return $data;
    }

}

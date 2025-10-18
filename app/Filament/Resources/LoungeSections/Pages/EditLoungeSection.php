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

    protected function mutateFormDataBeforeSave(array $data): array
    {   
        if ($data['media_type'] === 'image') {
            $data['media_path'] = $data['upload_path'] ?? null;
        } elseif ($data['media_type'] === 'video') {
            $data['media_path'] = $data['video_url'] ?? null;
        }  

        unset($data['upload_path'], $data['video_url']);

        return $data;
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        if (($data['media_type'] ?? null) === 'image') {
            $data['upload_path'] = $data['media_path'];
        } elseif (($data['media_type'] ?? null) === 'video') {
            $data['video_url'] = $data['media_path'];
        }

        return $data;
    }

}

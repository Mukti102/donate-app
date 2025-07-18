<?php

namespace App\Filament\Resources\DonaturResource\Pages;

use App\Filament\Resources\DonaturResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDonatur extends CreateRecord
{
    protected static string $resource = DonaturResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    
     protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['snap_token'] = '10191919'; // atau Snap::getSnapToken($data)
        return $data;
    }
}

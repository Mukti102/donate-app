<?php

namespace App\Filament\Resources\VideoInspirationResource\Pages;

use App\Filament\Resources\VideoInspirationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateVideoInspiration extends CreateRecord
{
    protected static string $resource = VideoInspirationResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

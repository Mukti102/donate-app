<?php

namespace App\Filament\Resources\VideoInspirationResource\Pages;

use App\Filament\Resources\VideoInspirationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVideoInspiration extends EditRecord
{
    protected static string $resource = VideoInspirationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

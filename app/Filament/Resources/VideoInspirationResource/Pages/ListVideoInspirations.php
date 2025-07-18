<?php

namespace App\Filament\Resources\VideoInspirationResource\Pages;

use App\Filament\Resources\VideoInspirationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVideoInspirations extends ListRecords
{
    protected static string $resource = VideoInspirationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

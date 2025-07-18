<?php

namespace App\Filament\Resources\CategoryCampaignResource\Pages;

use App\Filament\Resources\CategoryCampaignResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCategoryCampaigns extends ListRecords
{
    protected static string $resource = CategoryCampaignResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

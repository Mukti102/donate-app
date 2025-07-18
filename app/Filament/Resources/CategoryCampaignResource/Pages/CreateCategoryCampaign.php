<?php

namespace App\Filament\Resources\CategoryCampaignResource\Pages;

use App\Filament\Resources\CategoryCampaignResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCategoryCampaign extends CreateRecord
{
    protected static string $resource = CategoryCampaignResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

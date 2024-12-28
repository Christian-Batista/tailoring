<?php

namespace App\Filament\Resources\IncidentResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\IncidentResource;
use App\Filament\Resources\Utilities\ResourceUtility;

class ListIncidents extends ListRecords
{
    protected static string $resource = IncidentResource::class;

    public function getTitle(): string
    {
        return ResourceUtility::getResourceProperty('Incident', 'label');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label(ResourceUtility::getResourceProperty('Incident', 'creation_button')),
        ];
    }
}

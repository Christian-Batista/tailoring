<?php

namespace App\Filament\Resources\IncidentResource\Pages;

use App\Filament\Resources\IncidentResource;
use App\Filament\Resources\Utilities\ResourceUtility;
use Filament\Resources\Pages\CreateRecord;

class CreateIncident extends CreateRecord
{
    protected static string $resource = IncidentResource::class;
    public function getTitle(): string
    {
        return ResourceUtility::getResourceProperty('Incident', 'label');
    }
}

<?php

namespace App\Filament\Resources\IncidentResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\IncidentResource;
use App\Filament\Resources\Utilities\ResourceUtility;

class EditIncident extends EditRecord
{
    protected static string $resource = IncidentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
            ->label(ResourceUtility::getResourceProperty('Incident', 'delete_button')),
        ];
    }
}

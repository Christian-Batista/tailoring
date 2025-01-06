<?php

namespace App\Filament\Resources\IncidentResource\Pages;

use App\Filament\Resources\IncidentResource;
use App\Filament\Resources\Utilities\ResourceUtility;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\CreateRecord;
use PHPUnit\Framework\Attributes\Before;

class CreateIncident extends CreateRecord
{
    protected static string $resource = IncidentResource::class;
    public function getTitle(): string
    {
        return ResourceUtility::getResourceProperty('Incident', 'label');
    }

    // protected function mutateFormDataBeforeCreate(array $data): array
    // {
    //     dd($data, $this->form->getRawState());
    //     return $data;
    // }

    // protected function getCreateFormAction(): \Filament\Actions\Action
    // {
    //     return parent::getCreateFormAction()
    //     ->before(function (CreateAction $action, array $data) {
    //         dd($data, $action->getRecord());
    //     });
    // }
}

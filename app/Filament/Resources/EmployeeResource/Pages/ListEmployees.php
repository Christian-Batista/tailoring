<?php

namespace App\Filament\Resources\EmployeeResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\EmployeeResource;
use App\Filament\Resources\Utilities\ResourceUtility;

class ListEmployees extends ListRecords
{
    protected static string $resource = EmployeeResource::class;

    public function getTitle(): string
    {
        return ResourceUtility::getResourceProperty('Employee', 'label');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label(ResourceUtility::getResourceProperty('Employee', 'creation_button')),
        ];
    }
}

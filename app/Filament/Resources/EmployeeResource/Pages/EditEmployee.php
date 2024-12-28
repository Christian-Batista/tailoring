<?php

namespace App\Filament\Resources\EmployeeResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\EmployeeResource;
use App\Filament\Resources\Utilities\ResourceUtility;

class EditEmployee extends EditRecord
{
    protected static string $resource = EmployeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label(ResourceUtility::getResourceProperty('Employee', 'delete_button')),
        ];
    }
}

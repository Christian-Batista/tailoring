<?php

namespace App\Filament\Resources\PermissionResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\PermissionResource;
use App\Filament\Resources\Utilities\ResourceUtility;

class ListPermissions extends ListRecords
{
    protected static string $resource = PermissionResource::class;

    public function getTitle(): string
    {
        return ResourceUtility::getResourceProperty('Permission', 'label');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\PermissionResource\Pages;

use App\Filament\Resources\PermissionResource;
use App\Filament\Resources\Utilities\ResourceUtility;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePermission extends CreateRecord
{

    public function getTitle(): string
    {
        return ResourceUtility::getResourceProperty('Permission', 'creation_label');
    }
    protected static string $resource = PermissionResource::class;
}

<?php

namespace App\Filament\Resources\RoleResource\Pages;

use Filament\Actions;
use App\Filament\Resources\RoleResource;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\Utilities\ResourceUtility;

class CreateRole extends CreateRecord
{

    protected static string $resource = RoleResource::class;
    public function getTitle(): string
    {
        return ResourceUtility::getResourceProperty('Role', 'creation_label');
    }

    
}

<?php

namespace App\Filament\Resources\PermissionResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\PermissionResource;
use App\Filament\Resources\Utilities\ResourceUtility;

class EditPermission extends EditRecord
{
    protected static string $resource = PermissionResource::class;

    public function getTitle(): string
    {
        return ResourceUtility::getResourceProperty('Permission', 'update_button');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

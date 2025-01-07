<?php

namespace App\Filament\Resources\RoleResource\Pages;

use Filament\Actions;
use App\Filament\Resources\RoleResource;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\Utilities\ResourceUtility;

class EditRole extends EditRecord
{
    protected static string $resource = RoleResource::class;

    public function getTitle(): string
    {
        return ResourceUtility::getResourceProperty('Role', 'update_button');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
            ->label(ResourceUtility::getResourceProperty('Role', 'delete_button')),
        ];
    }
}

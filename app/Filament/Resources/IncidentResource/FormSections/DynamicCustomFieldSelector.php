<?php

namespace App\Filament\Resources\IncidentResource\FormSections;

use Filament\Forms\Get;
use App\Models\Incident;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Checkbox;

class DynamicCustomFieldSelector
{
    public static function make()
    {
        return [
            Grid::make()
                ->schema(function (Get $get) {
                    $incidentTypeId = $get('reference_id');
                    if (!$incidentTypeId) {
                        return [];
                    }

                    $customFields = Incident::find($incidentTypeId)
                        ->customFields()
                        ->get();

                    return $customFields->map(function ($field) {
                        return Checkbox::make("value.selected_fields.{$field->id}") // Cambiar la clave a "value.selected_fields"
                        ->label($field->name)
                            ->reactive();
                    })->toArray();
                })
                ->columns(2)
        ];
    }
}
<?php

namespace App\Filament\Resources\IncidentResource\FormSections;

use Filament\Forms\Set;
use App\Models\Incident;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;

class CreateSubTaskForm
{
    public static function make(): array
    {
        return [
            Section::make('Seleccion de la sub-tarea')
                ->schema([
                    Select::make('reference_id')
                    ->label('Tipo de tarea')
                    ->options(function () {
                        return Incident::all()->pluck('name', 'id')->toArray();
                    })
                    ->required()
                    ->reactive()
                    ->helperText('Selecciona el tipo de tarea para ver sus datos disponibles.')
                    ->afterStateUpdated(function (Set $set, $state) {
                        $set('reference_id', $state);
                    })
                ]),
                ...DynamicCustomFieldSelector::make()
        ];
    }
}

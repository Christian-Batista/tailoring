<?php

namespace App\Filament\Resources\IncidentResource\FormSections;

use App\Models\IncidentStatus;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;

class StatusForm
{
    public static function make() {
        return Repeater::make('Status')
            ->itemLabel(fn (array $state): ? string => $state['name'] ?? null)
            ->collapsed(fn ($record) => $record instanceof IncidentStatus)
            ->relationship('status')
            ->label('')
            ->addActionLabel('Agregar estado')
            ->reorderableWithDragAndDrop()
            ->schema([
                TextInput::make('name')
                ->label('Nombre del estado')
                ->required()
                ->placeholder('Ejemplo: Medida tomada'),

                TextInput::make('position')
                ->label('Posicion')
                ->required()
                ->placeholder('Ejemplo: 0'),

                Checkbox::make('final')
                    ->label('Estado Final')
                    ->helperText('Marcar si este es el estado final de la incidencia')
                    ,
                // This is the hook form component
                Grid::make()
                ->schema(function ($record) {
                    if ($record instanceof IncidentStatus) {
                        return [TriggersForm::make()];
                    }

                    return [];
                })

            ])->columns(3);
    }
}

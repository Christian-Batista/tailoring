<?php

namespace App\Filament\Resources\IncidentResource\FormSections;

use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;

class FormTypes
{
    public static function make()
    {
        return Section::make()
        ->description(new HtmlString('<span style="color: #1F3A8A; font-weight: 900;">Gestor de Formularios Personalizados:</span> Aquí puedes agregar varios tipos de campos que se adapten a las necesidades del tipo de tarea creado.'))
        ->schema([
            Repeater::make('field_type')
            ->itemLabel(fn (array $state): ? string => $state['name'] ?? null)
            ->relationship('customFields')
            ->label('Campos personalizados')
            ->addActionLabel('Agregar campo personalizado')
            ->schema([
                Select::make('field_type_id')
                ->label('Tipo de campo')
                ->options([
                    'input' => 'Campo tipo Input',
                    'text' => 'Campo tipo Texto',
                    'select' => 'Campo tipo Select',
                    'select-multiple' => 'Campo tipo Selección Múltiple',
                ])->reactive(),

                TextInput::make('name')
                ->label('Etiqueta del campo')
                ->required()
                ->placeholder('Ejemplo: Nombre del cliente')
            ])
            ->collapsible()
            ->columns(2)
            ->defaultItems(0)
        ]);
    }
}

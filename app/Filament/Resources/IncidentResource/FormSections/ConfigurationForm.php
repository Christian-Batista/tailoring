<?php

namespace App\Filament\Resources\IncidentResource\FormSections;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\HtmlString;

class ConfigurationForm
{
    public static function make()
    {
        return Section::make('Detalles de la incidencia')
        ->schema([
            Grid::make()
            ->schema([
                TextInput::make('name')
                ->label('Nombre')
                ->required()
                ->helperText(new HtmlString('<span style="color: #1F3A8A; font-weight: 900;">Nombre de la incidencia</span>')),

                Textarea::make('description')
                ->label('Descripción')
                ->required()
                ->helperText(new HtmlString('<span style="color: #1F3A8A; font-weight: 900;">Descripción de la incidencia</span>'))
            ])->columns(1)
        ]);
    }
}

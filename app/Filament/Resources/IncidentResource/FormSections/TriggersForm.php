<?php

namespace App\Filament\Resources\IncidentResource\FormSections;

use Filament\Forms\Components\Group;
use Filament\Forms\Get;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\HtmlString;

class TriggersForm
{
    public static function make() {
        return Group::make()
            ->schema([
                // Verificar si el registro ya existe.
                Placeholder::make('')
                    ->content(new HtmlString('<div class="flex flex-col">
                    <H1 class="text-xl justify-center items-center">
                        <span class="text-gray-900 dark:text-gray-100">
                            Antes de crear el disparador debes de crear los estados de la tarea y guardar los cambios.
                        </span>
                    </H1>
                    </div>'))
                    ->visible(fn($record) => !($record instanceof Model)),
                Repeater::make('hooks')
                    ->relationship('status.hooks')
                    ->label('Hooks')
                    ->itemLabel(fn (array $state): ?string => $state['action_type'] ?? null)
                    ->collapsed()
                    ->addActionLabel('Agregar Disparador')
                    ->visible(fn($record) => $record instanceof Model)
                    ->schema([
                        TextInput::make('status_id')
                            ->default(fn ($record) => $record->id ?? null)
                            ->visible(false),

                        Select::make('action_type')
                            ->label('Tipo de Disparador')
                            ->required()
                            ->options([
                                'create_sub_task' => 'Crear Sub-Tarea',
                            ])
                            ->afterStateUpdated(function ($state, $set) {
                                if ($state === 'create_sub_task') {
                                    $set('config_type', 'sub_task');
                                }
                            }),

                        // Mostrar el formulario adecuado según el valor de 'trigger'
                        Group::make()
                            ->schema(function (Get $get) {
                                $action_type = $get('action_type');

                                if ($action_type === 'create_sub_task') {
                                    return CreateSubTaskForm::make() ?? [];
                                }

                                return [];
                            }),

                    ])->columns(2)
            ]);
    }
}

<?php

namespace App\Filament\Resources\Utilities;

class ResourceUtility
{
    protected static array $resourcesUtilities = [
        'Incident' => [
            'label' => 'Incidencias',
            'creation_label' => 'Creacion de incidencia',
            'creation_button' => 'Crear incidencia',
            'update_button' => 'Actualizar incidencia',
            'delete_button' => 'Eliminar incidencia',
            'icon' => 'heroicon-s-alert',
        ]
    ];
    public static function getResourceProperty(string $resourceName, string $property): ?string
    {
        // Verify if the resource exists
        if (isset(static::$resourcesUtilities[$resourceName]) && isset(static::$resourcesUtilities[$resourceName][$property])) {
            return static::$resourcesUtilities[$resourceName][$property];
        }

        return 'no existe';
    }
}

<?php

namespace App\Filament\Resources\Utilities;

class ResourceUtility
{
    protected static array $resourcesUtilities = [
        'Incident' => [
            'label' => 'Incidencias',
            'group' => 'Configuraciones',
            'creation_label' => 'Creacion de incidencia',
            'creation_button' => 'Crear incidencia',
            'update_button' => 'Actualizar incidencia',
            'delete_button' => 'Eliminar incidencia',
        ],
        'Employee' => [
            'label' => 'Empleados',
            'group' => 'Configuraciones',
            'creation_label' => 'Creacion de empleado',
            'creation_button' => 'Crear empleado',
            'update_button' => 'Actualizar empleado',
            'delete_button' => 'Eliminar empleado',
        ],
        'Permission' => [
            'label' => 'Permisos',
            'group' => 'Configuraciones',
            'creation_label' => 'Creacion de permiso',
            'creation_button' => 'Crear permiso',
            'update_button' => 'Actualizar permiso',
            'delete_button' => 'Eliminar permiso',
        ],
        'Role' => [
            'label' => 'Roles',
            'group' => 'Configuraciones',
            'creation_label' => 'Creacion de rol',
            'creation_button' => 'Crear rol',
            'update_button' => 'Actualizar rol',
            'delete_button' => 'Eliminar rol',
        ],
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

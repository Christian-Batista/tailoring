<?php

namespace App\Filament\Resources\EmployeeResource\Pages;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\EmployeeResource;
use App\Filament\Resources\Utilities\ResourceUtility;

class CreateEmployee extends CreateRecord
{
    protected static string $resource = EmployeeResource::class;

    public function getTitle(): string
    {
        return ResourceUtility::getResourceProperty('Employee', 'creation_label');
    }

    public function mutateFormDataBeforeCreate(array $data): array
    {   
        //dd($data);
        // First create the user
        $user = User::firstOrCreate(
            [
                'name' => $data['user']['name'],
                'email' => $data['user']['email'],
                'password' => bcrypt($data['user']['password']),
            ]
        );
        // Then assign the user_id to creation
        $data['user_id'] = $user->id;

        // Add Differenciation to employee photo
        if (isset($data['photo'])) {
            $randomNumbers = random_int(100000, 999999);
            $data['photo'] = $randomNumbers . $data['photo']->getClientOriginalName();
        }

        // Assign roles toi the user (if roles are provided in the form)
        if (isset($data['user']['roles']) && !empty($data['user']['roles'])) {
            $user->roles()->attach($data['user']['roles']);
        }

        return $data;
    }

}

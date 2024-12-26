<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'last_name',
        'phone_number',
        'emergency_contact',
        'photo',
        'image',
        'address',
        'id_number',
        'email',
        'password',
    ];

    protected $casts = [
        'emergency_contact' => 'array',
    ];

    protected $hidden = [
        'password',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'clients';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'phone',
        'address',
        'type',
    ];

    const TYPES = [
        'regular' => 'Regular Client',
        'tailor' => 'Tailor Client',
        'online_client' => 'Online Client',
    ];
}

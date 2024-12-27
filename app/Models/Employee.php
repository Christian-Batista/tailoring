<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'user_id',
        'phone_number',
        'emergency_contact',
        'photo',
        'address',
        'id_number',
    ];

    protected $casts = [
        'emergency_contact' => 'array',
        'password' => 'hashed',
    ];

    protected $hidden = [
        'password',
    ];

    /**
     * The user that this employee belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'incidents';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];

    public function customFields()
    {
        return $this->hasMany(InicidentCustomField::class);
    }

    public function status()
    {
        return $this->hasMany(IncidentStatus::class, 'incident_id');
    }
}

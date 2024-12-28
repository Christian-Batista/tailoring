<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InicidentCustomField extends Model
{
    protected $table = 'incident_custom_fields';

    protected $fillable = [
        'name',
        'field_type',
        'field_value',
        'incident_id',
        'config',
    ];

    protected $casts = [    
        'config' => 'array',
    ];

    public function inicident()
    {
        return $this->belongsTo(Incident::class, 'incident_id');
    }
}

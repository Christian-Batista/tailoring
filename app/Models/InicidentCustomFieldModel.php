<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InicidentCustomFieldModel extends Model
{
    protected $table = 'incident_custom_fields';

    protected $fillable = [
        'name',
        'field_type',
        'field_value',
        'inicident_id',
        'config',
    ];

    protected $casts = [    
        'config' => 'array',
    ];

    public function inicident()
    {
        return $this->belongsTo(InicidentModel::class, 'inicident_id');
    }
}

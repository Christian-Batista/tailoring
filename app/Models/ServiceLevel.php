<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceLevel extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'service_levels';

    protected $fillable = [
        'name',
        'description',
        'response_time',
        'resolution_time',
        'priority',
    ];

    public function inicident()
    {
        return $this->belongsTo(Incident::class);
    }
}

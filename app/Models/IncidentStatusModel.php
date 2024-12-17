<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IncidentStatusModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'incident_statuses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'position',
        'final',
        'incident_id',
    ];

    public function incident()
    {
        return $this->belongsTo(InicidentModel::class, 'incident_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InicidentModel extends Model
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
        'service_level_id',
    ];

    public function service_level()
    {
        return $this->hasOne(ServiceLevelModel::class, 'id', 'service_level_id');
    }

    public function custom_fields()
    {
        return $this->hasMany(InicidentCustomFieldModel::class);
    }

    public function status()
    {
        return $this->hasMany(IncidentStatusModel::class);
    }
}

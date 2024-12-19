<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hook extends Model
{
    protected $table = 'hooks';

    protected $fillable = [
        'name',
        'action_type',
        'reference_id',
        'status_id',
        'value',
    ];

    protected $casts = [
        'value' => 'array',
    ];

    public function status()
    {
        return $this->belongsTo(IncidentStatus::class, 'status_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($hook) {
            if (! $hook->value) {
                $hook->value = [];
            }
        });
    }
}

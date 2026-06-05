<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $fillable = [
        'name', 'city', 'address', 'map_url', 'is_active'
    ];

    public function schedules()
    {
        return $this->hasMany(TrainingSchedule::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingSchedule extends Model
{
    protected $fillable = [
        'day_name', 'time_range', 'program_name', 'venue_id', 'is_active'
    ];

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }
}

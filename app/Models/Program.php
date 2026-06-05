<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'title', 'age_group', 'description', 'image', 'sort_order', 'is_active'
    ];
}

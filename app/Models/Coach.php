<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    protected $fillable = [
        'name', 'role', 'bio', 'photo', 'sort_order', 'is_active'
    ];
}

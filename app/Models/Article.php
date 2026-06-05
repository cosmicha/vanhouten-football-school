<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'category',
        'excerpt',
        'content',
        'image',
        'is_active',
        'sort_order',
    ];
}

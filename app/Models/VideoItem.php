<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoItem extends Model
{
    protected $fillable = [
        'title', 'video_type', 'video_url', 'video_file', 'thumbnail', 'sort_order', 'is_active'
    ];
}

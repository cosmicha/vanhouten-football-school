<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = [
        'parent_name',
        'child_name',
        'child_age',
        'phone',
        'email',
        'message',
        'is_read',
        'status',
        'admin_notes',
    ];
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Concerns\SimpleCrud;
use App\Models\Coach;

class CoachController extends Controller
{
    use SimpleCrud;

    protected $model = Coach::class;
    protected $routePrefix = 'admin.coaches';
    protected $mediaSizes = ['photo' => [1200, 1500]];
    protected $fileFields = ['photo' => 'coaches'];

    protected $config = [
        'title' => 'Coaches',
        'fields' => [
            'name' => 'text',
            'role' => 'text',
            'bio' => 'textarea',
            'photo' => 'image',
            'sort_order' => 'number',
        ],
    ];
}

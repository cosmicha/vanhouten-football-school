<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Concerns\SimpleCrud;
use App\Models\Venue;

class VenueController extends Controller
{
    use SimpleCrud;

    protected $model = Venue::class;
    protected $routePrefix = 'admin.venues';
    protected $fileFields = [];

    protected $config = [
        'title' => 'Venues / Locations',
        'fields' => [
            'name' => 'text',
            'city' => 'text',
            'address' => 'textarea',
            'map_url' => 'text',
        ],
    ];
}

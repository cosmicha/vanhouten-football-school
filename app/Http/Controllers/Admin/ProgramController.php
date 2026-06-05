<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Concerns\SimpleCrud;
use App\Models\Program;

class ProgramController extends Controller
{
    use SimpleCrud;

    protected $model = Program::class;
    protected $routePrefix = 'admin.programs';
    protected $mediaSizes = ['image' => [1200, 900]];
    protected $fileFields = ['image' => 'programs'];

    protected $config = [
        'title' => 'Programs / Classes',
        'fields' => [
            'title' => 'text',
            'age_group' => 'text',
            'description' => 'textarea',
            'image' => 'image',
            'sort_order' => 'number',
        ],
    ];
}

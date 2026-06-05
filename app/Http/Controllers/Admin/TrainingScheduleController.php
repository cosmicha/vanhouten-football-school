<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Concerns\SimpleCrud;
use App\Models\TrainingSchedule;

class TrainingScheduleController extends Controller
{
    use SimpleCrud;

    protected $model = TrainingSchedule::class;
    protected $routePrefix = 'admin.schedules';
    protected $fileFields = [];

    protected $config = [
        'title' => 'Training Schedule',
        'fields' => [
            'day_name' => 'text',
            'time_range' => 'text',
            'program_name' => 'text',
            'venue_id' => 'venue',
        ],
    ];
}

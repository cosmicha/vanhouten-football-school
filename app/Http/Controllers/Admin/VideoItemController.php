<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Concerns\SimpleCrud;
use App\Models\VideoItem;

class VideoItemController extends Controller
{
    use SimpleCrud;

    protected $model = VideoItem::class;
    protected $routePrefix = 'admin.videos';
    protected $mediaSizes = ['thumbnail' => [1280, 720]];
    protected $fileFields = [
        'video_file' => 'videos',
        'thumbnail' => 'video-thumbnails',
    ];

    protected $config = [
        'title' => 'Videos',
        'fields' => [
            'title' => 'text',
            'video_type' => 'text',
            'video_url' => 'text',
            'video_file' => 'file',
            'thumbnail' => 'image',
            'sort_order' => 'number',
        ],
    ];
}

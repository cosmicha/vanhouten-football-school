<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Concerns\SimpleCrud;
use App\Models\GalleryItem;

class GalleryItemController extends Controller
{
    use SimpleCrud;

    protected $model = GalleryItem::class;
    protected $routePrefix = 'admin.gallery';
    protected $mediaSizes = ['image' => [1200, 1200]];
    protected $fileFields = ['image' => 'gallery'];

    protected $config = [
        'title' => 'Gallery',
        'fields' => [
            'title' => 'text',
            'image' => 'image',
            'sort_order' => 'number',
        ],
    ];
}

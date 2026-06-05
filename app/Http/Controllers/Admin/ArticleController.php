<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Concerns\SimpleCrud;
use App\Models\Article;

class ArticleController extends Controller
{
    use SimpleCrud;

    protected $model = Article::class;
    protected $routePrefix = 'admin.articles';
    protected $mediaSizes = ['image' => [1600, 900]];
    protected $fileFields = ['image' => 'articles'];

    protected $config = [
        'title' => 'News / Articles',
        'fields' => [
            'title' => 'text',
            'category' => 'text',
            'excerpt' => 'textarea',
            'content' => 'textarea',
            'image' => 'image',
            'sort_order' => 'number',
        ],
    ];
}

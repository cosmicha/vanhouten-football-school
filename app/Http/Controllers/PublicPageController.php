<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Coach;
use App\Models\GalleryItem;
use App\Models\Program;
use App\Models\SiteSetting;
use App\Models\TrainingSchedule;
use App\Models\Venue;
use App\Models\VideoItem;

class PublicPageController extends Controller
{
    public function home()
    {
        $setting = SiteSetting::current();

        $programs = Program::where('is_active', true)->orderBy('sort_order')->get();
        $coaches = Coach::where('is_active', true)->orderBy('sort_order')->get();
        $venues = Venue::where('is_active', true)->get();
        $schedules = TrainingSchedule::with('venue')->where('is_active', true)->get();
        $gallery = GalleryItem::where('is_active', true)->orderBy('sort_order')->get();
        $videos = VideoItem::where('is_active', true)->orderBy('sort_order')->get();
        $articles = Article::where('is_active', true)->orderBy('sort_order')->latest()->take(3)->get();

        return view('public.home', compact(
            'setting',
            'programs',
            'coaches',
            'venues',
            'schedules',
            'gallery',
            'videos',
            'articles'
        ));
    }

    public function article(Article $article)
    {
        abort_unless($article->is_active, 404);

        $setting = SiteSetting::current();

        return view('public.article', compact('setting', 'article'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Coach;
use App\Models\ContactMessage;
use App\Models\GalleryItem;
use App\Models\Program;
use App\Models\TrainingSchedule;
use App\Models\VideoItem;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'programs' => Program::count(),
            'coaches' => Coach::count(),
            'schedules' => TrainingSchedule::count(),
            'gallery' => GalleryItem::count(),
            'videos' => VideoItem::count(),
            'articles' => Article::count(),
            'leads' => ContactMessage::count(),
            'new_leads' => ContactMessage::where('status', 'new')->count(),
        ];

        $leadStatus = [
            'new' => ContactMessage::where('status', 'new')->count(),
            'contacted' => ContactMessage::where('status', 'contacted')->count(),
            'trial_scheduled' => ContactMessage::where('status', 'trial_scheduled')->count(),
            'registered' => ContactMessage::where('status', 'registered')->count(),
            'lost' => ContactMessage::where('status', 'lost')->count(),
        ];

        $latestMessages = ContactMessage::latest()->take(8)->get();

        return view('admin.dashboard.index', compact('stats', 'leadStatus', 'latestMessages'));
    }
}

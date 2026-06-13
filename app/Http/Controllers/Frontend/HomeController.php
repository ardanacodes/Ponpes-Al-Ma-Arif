<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Gallery;
use App\Models\Video;
use Inertia\Inertia;
use App\Models\Announcement;

class HomeController extends Controller
{
    public function index()
    {
        $news = News::latest()->take(4)->get();

        $galleries = Gallery::latest()->take(6)->get();

        $videos = Video::latest()->take(3)->get();
        $announcements = Announcement::where('is_active', true)
            ->latest()
            ->get();


        return Inertia::render('Frontend/Home', [
            'news' => $news,
            'galleries' => $galleries,
            'videos' => $videos,
            'announcements' => $announcements,
        ]);
    }
}

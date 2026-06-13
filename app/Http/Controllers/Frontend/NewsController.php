<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use Inertia\Inertia;

class NewsController extends Controller
{
    /**
     * Halaman daftar berita
     */
    public function index()
    {
        $news = News::latest()

            ->withCount([
                'comments' => function ($query) {
                    $query->where('status', 'approved');
                }
            ])

            ->get();

        return Inertia::render('Frontend/News/Index', [
            'news' => $news
        ]);
    }


    public function show($slug)
    {
        $news = News::where('slug', $slug)
            ->with([
                'comments' => function ($query) {
                    $query->where('status', 'approved')
                        ->latest();
                }
            ])
            ->firstOrFail();

        $otherNews = News::where('id', '!=', $news->id)
            ->latest()
            ->take(5)
            ->get();

        return Inertia::render('Frontend/News/Show', [
            'news' => $news,
            'otherNews' => $otherNews
        ]);
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Inertia\Inertia;

class GalleryController extends Controller
{
    public function index()
    {
        return Inertia::render('Frontend/Gallery/Index', [
            'galleries' => Gallery::latest()->get()
        ]);
    }
}

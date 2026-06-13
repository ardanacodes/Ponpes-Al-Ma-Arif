<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Extracurricular;
use App\Models\Gallery;
use App\Models\Facility;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Dashboard', [
            'totalNews' => News::count(),
            'totalExtracurricular' => Extracurricular::count(),
            'totalGallery' => Gallery::count(),
            'totalFacility' => Facility::count(),
        ]);
    }
}

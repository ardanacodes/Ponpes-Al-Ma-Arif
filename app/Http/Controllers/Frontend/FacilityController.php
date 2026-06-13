<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Inertia\Inertia;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::latest()->paginate(6);

        return Inertia::render('Frontend/Profile/Fasilitas', [
            'facilities' => $facilities
        ]);
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Extracurricular;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ExtracurricularController extends Controller
{
    public function index()
    {
        // 1. Ambil data dengan PAGINATE (jangan all() atau get()) agar struktur objek .data dan .links-nya terbentuk
        $extracurriculars = Extracurricular::latest()->paginate(9);

        // 2. Kirim ke Vue dengan key 'extracurriculars' (wajib huruf kecil dan sama persis dengan defineProps di Vue)
        return Inertia::render('Frontend/Profile/Ekstrakurikuler', [
            'extracurriculars' => $extracurriculars
        ]);
    
    }
}
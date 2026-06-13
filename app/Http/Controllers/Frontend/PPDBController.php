<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PPDB;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PPDBController extends Controller
{
    public function index()
    {
        return Inertia::render('Frontend/PPDB/Index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([

            'name' => 'required',
            'gender' => 'required',

            'birth_place' => 'required',
            'birth_date' => 'required|date',

            'address' => 'required',

            'school_origin' => 'required',

            'phone' => 'required',

            'father_name' => 'required',
            'mother_name' => 'required',

            'program_type' => 'required|in:Mukim,Non Mukim',
            'education_level' => 'required|in:MTs,SMA Plus,SMK',

            'major' => 'nullable|string',

        ]);

        PPDB::create($validated);

        return redirect()
            ->back()
            ->with('success', 'Terima kasih sudah mendaftar. Silakan tunggu konfirmasi WhatsApp dari admin.');
    }
}

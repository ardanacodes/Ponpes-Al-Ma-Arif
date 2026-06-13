<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Extracurricular;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Inertia\Inertia;

class ExtracurricularController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Extracurricular/Index', [
            'extracurriculars' => Extracurricular::latest()->get()
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Extracurricular/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'thumbnail' => 'nullable|image|max:2048'
        ]);

        $thumbnail = null;

        if ($request->hasFile('thumbnail')) {

            $thumbnail = $request->file('thumbnail')
                ->store('extracurriculars', 'public');
        }

        Extracurricular::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'thumbnail' => $thumbnail,
        ]);

        return redirect('/admin/extracurriculars')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Extracurricular $extracurricular)
    {
        return Inertia::render('Admin/Extracurricular/Edit', [
            'extracurricular' => $extracurricular
        ]);
    }

    public function update(Request $request, Extracurricular $extracurricular)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'thumbnail' => 'nullable|image|max:2048'
        ]);

        $thumbnail = $extracurricular->thumbnail;

        if ($request->hasFile('thumbnail')) {

            // Hapus gambar lama
            if ($extracurricular->thumbnail) {

                Storage::disk('public')
                    ->delete($extracurricular->thumbnail);
            }

            // Upload gambar baru
            $thumbnail = $request->file('thumbnail')
                ->store('extracurriculars', 'public');
        }

        $extracurricular->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'thumbnail' => $thumbnail,
        ]);

        return redirect('/admin/extracurriculars')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Extracurricular $extracurricular)
    {
        // Hapus gambar
        if ($extracurricular->thumbnail) {

            Storage::disk('public')
                ->delete($extracurricular->thumbnail);
        }

        $extracurricular->delete();

        return back()
            ->with('success', 'Data berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VideoController extends Controller
{
    /**
     * INDEX
     */
    public function index()
    {
        return Inertia::render('Admin/Videos/Index', [
            'videos' => Video::latest()->get()
        ]);
    }

    /**
     * CREATE
     */
    public function create()
    {
        return Inertia::render('Admin/Videos/Create');
    }

    /**
     * STORE
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'youtube_url' => 'required|url',
        ]);

        Video::create([
            'title' => $request->title,
            'youtube_url' => $request->youtube_url,
        ]);

        return redirect('/admin/videos')
            ->with('success', 'Video berhasil ditambahkan');
    }

    /**
     * EDIT
     */
    public function edit(Video $video)
    {
        return Inertia::render('Admin/Videos/Edit', [
            'video' => $video
        ]);
    }

    /**
     * UPDATE
     */
    public function update(Request $request, Video $video)
    {
        $request->validate([
            'title' => 'required',
            'youtube_url' => 'required|url',
        ]);

        $video->update([
            'title' => $request->title,
            'youtube_url' => $request->youtube_url,
        ]);

        return redirect('/admin/videos')
            ->with('success', 'Video berhasil diupdate');
    }

    /**
     * DELETE
     */
    public function destroy(Video $video)
    {
        $video->delete();

        return redirect('/admin/videos')
            ->with('success', 'Video berhasil dihapus');
    }
}

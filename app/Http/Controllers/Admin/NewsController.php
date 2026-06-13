<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class NewsController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/News/Index', [
            'news' => News::latest()->get()
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/News/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $thumbnail = null;

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail')
                ->store('news', 'public');
        }

        News::create([
            'title' => $request->title,
            'slug' => str()->slug($request->title),
            'content' => $request->content,
            'thumbnail' => $thumbnail,
        ]);

        return redirect('/admin/news')
            ->with('success', 'Berita berhasil ditambahkan');
    }

    public function edit(News $news)
    {
        return Inertia::render('Admin/News/Edit', [
            'news' => $news
        ]);
    }

    public function update(Request $request, News $news)
    {
        // 1. Gunakan validasi yang lebih ketat untuk thumbnail
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Simpan path lama sebagai default
        $thumbnailPath = $news->thumbnail;

        // 2. Cek apakah ada file baru yang diupload
        if ($request->hasFile('thumbnail')) {

            // Hapus file lama dari storage jika memang ada
            if ($news->thumbnail && Storage::disk('public')->exists($news->thumbnail)) {
                Storage::disk('public')->delete($news->thumbnail);
            }

            // Simpan file baru
            $thumbnailPath = $request->file('thumbnail')->store('news', 'public');
        }


        $news->update([
            'title' => $request->title,
            'slug' => str()->slug($request->title),
            'content' => $request->content,
            'thumbnail' => $thumbnailPath,
        ]);

        return redirect('/admin/news')
            ->with('success', 'Berita berhasil diperbarui');
    }

    public function destroy(News $news)
    {

        if ($news->thumbnail) {
            Storage::disk('public')->delete($news->thumbnail);
        }

        $news->delete();

        return back()
            ->with('success', 'Berita berhasil dihapus');
    }
}

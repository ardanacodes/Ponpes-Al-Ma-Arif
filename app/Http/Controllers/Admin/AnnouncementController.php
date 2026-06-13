<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AnnouncementController extends Controller
{
    /**
     * List Pengumuman
     */
    public function index()
    {
        $announcements = Announcement::latest()->get();

        return Inertia::render('Admin/Announcements/Index', [
            'announcements' => $announcements
        ]);
    }

    /**
     * Form Create
     */
    public function create()
    {
        return Inertia::render('Admin/Announcements/Create');
    }

    /**
     * Simpan Data
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'date' => 'nullable|date',
        ]);

        Announcement::create([
            'title' => $request->title,
            'content' => $request->content,
            'date' => $request->date,
            'is_active' => $request->is_active ?? true,
        ]);

        return redirect('/admin/announcements')
            ->with('success', 'Pengumuman berhasil ditambahkan');
    }

    /**
     * Form Edit
     */
    public function edit($id)
    {
        $announcement = Announcement::findOrFail($id);

        return Inertia::render('Admin/Announcements/Edit', [
            'announcement' => $announcement
        ]);
    }

    /**
     * Update
     */
    public function update(Request $request, $id)
    {
        $announcement = Announcement::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'date' => 'nullable|date',
        ]);

        $announcement->update([
            'title' => $request->title,
            'content' => $request->content,
            'date' => $request->date,
            'is_active' => $request->is_active,
        ]);

        return redirect('/admin/announcements')
            ->with('success', 'Pengumuman berhasil diupdate');
    }

    /**
     * Hapus
     */
    public function destroy($id)
    {
        $announcement = Announcement::findOrFail($id);

        $announcement->delete();

        return back()
            ->with('success', 'Pengumuman berhasil dihapus');
    }
}

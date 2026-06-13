<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsComment;
use Inertia\Inertia;

class CommentController extends Controller
{
    /**
     * List komentar
     */
    public function index()
    {
        $comments = NewsComment::with('news')
            ->latest()
            ->get();

        return Inertia::render('Admin/Comments/Index', [
            'comments' => $comments
        ]);
    }

    /**
     * Approve komentar
     */
    public function approve($id)
    {
        $comment = NewsComment::findOrFail($id);

        $comment->update([
            'status' => 'approved'
        ]);

        return back()->with(
            'success',
            'Komentar berhasil disetujui'
        );
    }

    /**
     * Hapus komentar
     */
    public function destroy($id)
    {
        $comment = NewsComment::findOrFail($id);

        $comment->delete();

        return back()->with(
            'success',
            'Komentar berhasil dihapus'
        );
    }
}

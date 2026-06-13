<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\NewsComment;
use Illuminate\Http\Request;

class NewsCommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'comment' => 'required|min:3|max:1000',
        ]);

        // filter kata spam
        $badwords = ['judi', 'slot', 'casino'];

        foreach ($badwords as $word) {
            if (str_contains(strtolower($request->comment), $word)) {
                return back()->with('error', 'Komentar tidak valid');
            }
        }

        NewsComment::create([
            'news_id' => $id,
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
            'ip_address' => $request->ip(),
            'status' => 'pending'
        ]);

        return back()->with(
            'success',
            'Komentar berhasil dikirim dan sedang menunggu persetujuan admin.'
        );
    }
}

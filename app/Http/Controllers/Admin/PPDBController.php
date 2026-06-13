<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PPDB;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Exports\PPDBExport;
use Maatwebsite\Excel\Facades\Excel;

class PPDBController extends Controller
{
    public function index(Request $request)
    {
        $query = PPDB::latest();

        // FILTER PROGRAM
        if ($request->filled('program_type')) {
            $query->where('program_type', $request->program_type);
        }

        // FILTER JENJANG
        if ($request->filled('education_level')) {
            $query->where('education_level', $request->education_level);
        }

        // FILTER JURUSAN (KHUSUS SMK)
        if ($request->filled('major')) {
            $query->where('major', $request->major);
        }

        return Inertia::render('Admin/PPDB/Index', [
            'ppdb' => $query->get(),
            'filters' => [
                'program_type' => $request->program_type,
                'education_level' => $request->education_level,
                'major' => $request->major,
            ]
        ]);
    }

    public function show($id)
    {
        $data = PPDB::findOrFail($id);

        return Inertia::render('Admin/PPDB/Show', [
            'ppdb' => $data
        ]);
    }

    public function destroy($id)
    {
        PPDB::findOrFail($id)->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }

    public function export(Request $request)
    {
        return Excel::download(
            new PPDBExport($request),
            'data-ppdb.xlsx'
        );
    }
}

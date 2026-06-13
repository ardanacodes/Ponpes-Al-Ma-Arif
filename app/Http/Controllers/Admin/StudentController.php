<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends Controller
{
    public function index()
    {
        return Inertia::render(
            'Admin/Students/Index',
            [
                'students' => Student::with('schoolClass')->get()
            ]
        );
    }

    public function create()
    {
        return Inertia::render(
            'Admin/Students/Create',
            [
                'classes' => SchoolClass::all()
            ]
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:students,nis',
            'name' => 'required',
            'school_class_id' => 'required',
        ]);

        Student::create($request->all());

        return redirect('/admin/students')
            ->with('success', 'Siswa berhasil ditambahkan');
    }
    public function edit(Student $student)
    {
        return Inertia::render(
            'Admin/Students/Edit',
            [
                'student' => $student,
                'classes' => SchoolClass::all(),
            ]
        );
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return back();
    }

    public function update(
        Request $request,
        Student $student
    ) {

        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'school_class_id' => 'required',
        ]);

        $student->update($request->all());

        return redirect('/admin/students');
    }
    
}
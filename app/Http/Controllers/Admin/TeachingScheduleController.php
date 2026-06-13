<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeachingSchedule;
use App\Models\User;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TeachingScheduleController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/TeachingSchedules/Index', [
            'schedules' => TeachingSchedule::with([
                'teacher',
                'schoolClass'
            ])->latest()->get()
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/TeachingSchedules/Create', [
            'teachers' => User::where('role', 'guru')->get(),
            'classes' => SchoolClass::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required',
            'school_class_id' => 'required',
            'subject' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        TeachingSchedule::create($request->all());

        return redirect('/admin/teaching-schedules')
            ->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function edit(TeachingSchedule $teachingSchedule)
    {
        return Inertia::render('Admin/TeachingSchedules/Edit', [
            'schedule' => $teachingSchedule,
            'teachers' => User::where('role', 'guru')->get(),
            'classes' => SchoolClass::all(),
        ]);
    }

    public function update(
        Request $request,
        TeachingSchedule $teachingSchedule
    ) {

        $request->validate([
            'teacher_id' => 'required',
            'school_class_id' => 'required',
            'subject' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $teachingSchedule->update($request->all());

        return redirect('/admin/teaching-schedules')
            ->with('success', 'Jadwal berhasil diperbarui');
    }

    public function destroy(TeachingSchedule $teachingSchedule)
    {
        $teachingSchedule->delete();

        return back()
            ->with('success', 'Jadwal berhasil dihapus');
    }
}
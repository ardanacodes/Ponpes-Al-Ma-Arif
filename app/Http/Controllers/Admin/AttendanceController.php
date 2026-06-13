<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Inertia\Inertia;
class AttendanceController extends Controller

{
    public function index()
    {
        return Inertia::render(
            'Admin/Attendances/Index',
            [
                'attendances' => Attendance::with([
                    'details.student',
                    'teacher',
                    'teachingSchedule.schoolClass'
                ])
                ->latest()
                ->get()
            ]
        );
    }

    public function history()
    {
        $attendances = Attendance::with([
            'teacher',
            'teachingSchedule.schoolClass'
        ])
        ->latest()
        ->get();

        return Inertia::render(
            'Guru/Attendance/History',
            [
                'attendances' => $attendances
            ]
        );
    }
}
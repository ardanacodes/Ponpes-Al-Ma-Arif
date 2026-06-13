<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\TeachingSchedule;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class GuruDashboardController extends Controller
{
    public function index()
    {
        $days = [
            'Sunday'    => 'Minggu',
            'Monday'    => 'Senin',
            'Tuesday'   => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday'  => 'Kamis',
            'Friday'    => 'Jumat',
            'Saturday'  => 'Sabtu',
        ];

        $today = $days[now()->format('l')];

        $schedules = TeachingSchedule::with('schoolClass')
            ->where('teacher_id', Auth::id())
            ->where('day', $today)
            ->orderBy('start_time')
            ->get();

        $schedules->each(function ($schedule) {

            $schedule->already_attended =
                Attendance::where(
                    'teaching_schedule_id',
                    $schedule->id
                )
                ->whereDate(
                    'attendance_date',
                    now()
                )
                ->exists();
        $alreadyAttendance = Attendance::where(
            'teaching_schedule_id',
            $schedule->id
        )
        ->whereDate(
            'attendance_date',
            now()
        )
        ->exists();
        });

        return Inertia::render(
            'Guru/Dashboard',
            [
                'today' => $today,
                'schedules' => $schedules,
                'user' => Auth::user(),
            ]
        );
    }
}
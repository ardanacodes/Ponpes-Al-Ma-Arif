<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\TeachingSchedule;
use App\Models\Student;
use App\Models\Attendance;
use App\Models\AttendanceDetail;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class AttendanceController extends Controller
{
    public function create(TeachingSchedule $schedule)
    {
        $students = Student::where('school_class_id', $schedule->school_class_id)
            ->orderBy('name')
            ->get();

        $now = Carbon::now();

        $start = Carbon::parse($schedule->start_time)->subMinutes(15);
        $end   = Carbon::parse($schedule->end_time)->addMinutes(15);

        if (!$now->between($start, $end)) {

            return redirect()
                ->route('guru.dashboard')
                ->with(
                    'error',
                    'Absensi hanya dapat dilakukan saat jam pelajaran berlangsung.'
                );
        }
        
        return Inertia::render('Guru/Attendance/Create', [
            'schedule' => $schedule->load('schoolClass'),
            'students' => $students,
        ]);
    }

    public function store(Request $request, TeachingSchedule $schedule)
    {
        $request->validate([
            'attendances' => 'required|array',
            'attendances.*.student_id' => 'required|exists:students,id',
            'attendances.*.status' => 'required|in:hadir,izin,sakit,alpha',
        ]);

        // Cek absensi ganda
        $existingAttendance = Attendance::where('teaching_schedule_id', $schedule->id)
            ->whereDate('attendance_date', now()->toDateString())
            ->first();

        if ($existingAttendance) {
            return redirect()
                ->back()
                ->with('error', 'Absensi untuk jadwal ini hari ini sudah dibuat.');
        }

        $attendance = Attendance::create([
            'teaching_schedule_id' => $schedule->id,
            'teacher_id' => auth()->id(),
            'attendance_date' => now()->toDateString(),
        ]);

        foreach ($request->attendances as $data) {
            AttendanceDetail::create([
                'attendance_id' => $attendance->id,
                'student_id' => $data['student_id'],
                'status' => $data['status'],
            ]);
        }

        return redirect()
            ->route('guru.dashboard')
            ->with('success', 'Absensi berhasil disimpan');
    }

    public function recap(Request $request)
    {
        $month = $request->month ?? now()->format('Y-m');
        $students = Student::with('schoolClass')->get();

        $recap = $students->map(function ($student) use ($month) {
            $details = AttendanceDetail::where('student_id', $student->id)
                ->whereHas('attendance', function ($q) use ($month) {
                    $q->whereYear('attendance_date', Carbon::parse($month)->year)
                    ->whereMonth('attendance_date', Carbon::parse($month)->month);
                });

            return [
                'id' => $student->id,
                'nis' => $student->nis,
                'name' => $student->name,
                'class' => $student->schoolClass?->name,
                'hadir' => (clone $details)->where('status', 'hadir')->count(),
                'izin'  => (clone $details)->where('status', 'izin')->count(),
                'sakit' => (clone $details)->where('status', 'sakit')->count(),
                'alpha' => (clone $details)->where('status', 'alpha')->count(),
            ];
        });

        return Inertia::render('Guru/Attendance/Recap', [
            'recap' => $recap,
            'month' => $month,
            'classes' => SchoolClass::all()
        ]);
    }

    public function show(Attendance $attendance)
    {
        return Inertia::render('Admin/Attendances/Show', [
            'attendance' => $attendance->load([
                'teacher',
                'teachingSchedule.schoolClass',
                'details.student'
            ])
        ]);
    }

    public function history()
    {
        $attendances = Attendance::with([
            'details.student',
            'teachingSchedule.schoolClass'
        ])
        ->where('teacher_id', Auth::id())
        ->latest('attendance_date')
        ->get();

        return Inertia::render('Guru/Attendance/History', [
            'attendances' => $attendances
        ]);
    }

    public function exportPdf(Request $request)
    {
        $request->validate(['class_id' => 'required']);

        $class = SchoolClass::findOrFail($request->class_id);
        $students = Student::with('schoolClass')
            ->where('school_class_id', $request->class_id)
            ->get();

        $pdf = Pdf::loadView('pdf.attendance-recap', [
            'class' => $class,
            'students' => $students
        ]);

        return $pdf->download('rekap-' . $class->name . '.pdf');
    }
    public function detail(Attendance $attendance)
    {
        $attendance->load([
            'teacher',
            'teachingSchedule.schoolClass',
            'details.student'
        ]);

        return Inertia::render(
            'Guru/Attendance/Detail',
            [
                'attendance' => $attendance
            ]
        );
    }
}
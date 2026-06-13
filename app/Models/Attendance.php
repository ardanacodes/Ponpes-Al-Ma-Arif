<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'teaching_schedule_id',
        'teacher_id',
        'attendance_date',
    ];

    public function details()
    {
        return $this->hasMany(
            AttendanceDetail::class
        );
    }

    public function teacher()
    {
        return $this->belongsTo(
        User::class,'teacher_id');
    }

    public function teachingSchedule()
    {
        return $this->belongsTo(
            TeachingSchedule::class
        );
    }

}
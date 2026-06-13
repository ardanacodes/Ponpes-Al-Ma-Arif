<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttendanceSession extends Model
{
    protected $fillable = [
        'teaching_schedule_id',
        'attendance_date',
    ];

    public function schedule()
    {
        return $this->belongsTo(
            TeachingSchedule::class,
            'teaching_schedule_id'
        );
    }

    public function attendances()
    {
        return $this->hasMany(
            Attendance::class
        );
    }
}
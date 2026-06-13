<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeachingSchedule extends Model
{
    protected $fillable = [
        'teacher_id',
        'school_class_id',
        'subject',
        'day',
        'start_time',
        'end_time',
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class);
    }

    public function attendanceSessions()
    {
        return $this->hasMany(
            AttendanceSession::class
        );
    }
}
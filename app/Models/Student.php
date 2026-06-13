<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'nis',
        'name',
        'school_class_id'
    ];

    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class);
    }

    public function attendanceDetails()
    {
        return $this->hasMany(
            AttendanceDetail::class
        );
    }

    public function attendances()
    {
        return $this->hasMany(
            Attendance::class
        );
    }
}
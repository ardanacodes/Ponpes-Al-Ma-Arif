<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    protected $fillable = [
        'name'
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function teachingSchedules()
    {
        return $this->hasMany(
            TeachingSchedule::class
        );
    }
}
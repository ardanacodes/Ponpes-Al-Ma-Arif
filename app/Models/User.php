<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Kolom yang boleh diisi secara massal
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Ini penting untuk sistem role kamu
    ];

    /**
     * Kolom yang harus disembunyikan dari array/JSON
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function teachingSchedules()
    {
        return $this->hasMany(
            TeachingSchedule::class,
            'teacher_id'
        );
    }
}
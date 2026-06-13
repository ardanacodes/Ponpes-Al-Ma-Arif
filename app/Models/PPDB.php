<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PPDB extends Model
{
    protected $table = 'p_p_d_b_s';

    protected $fillable = [

        'name',
        'gender',

        'birth_place',
        'birth_date',

        'address',

        'school_origin',
        'phone',

        'father_name',
        'mother_name',

        'program_type',
        'education_level',
        'major',

    ];
}

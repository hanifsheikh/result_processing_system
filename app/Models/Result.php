<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{

    protected $fillable = [
        'student_name',
        'father_name',
        'mother_name',
        'group',
        'roll_no',
        'result_data',
        'grade'
    ];
}

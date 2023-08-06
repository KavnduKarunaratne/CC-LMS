<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable=['admission_number',
    'student_name',
    'email',
   
    'year_of_registration',
    'password',

    'class_id','grade_id'
    ];
}

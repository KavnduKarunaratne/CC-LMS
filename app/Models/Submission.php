<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $fillable=[
        'submission_name','subject_id','uploaded_date','description','submission_file','assignment_id','student_id'
    ];
}

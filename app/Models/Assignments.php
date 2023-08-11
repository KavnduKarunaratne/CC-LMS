<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignments extends Model
{
    use HasFactory;

    protected $fillable=[
        'assignment_name','subject_id','due_date','description','file','teacher_id','upload_date'
    ];

   
}

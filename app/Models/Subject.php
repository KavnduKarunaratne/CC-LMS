<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable=[
        'subject_name','grade_id', 'class_id', 'teacher_id'
    ];
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

}

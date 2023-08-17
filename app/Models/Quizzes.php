<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quizzes extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'description',
        'deadline',
        'class_id',
        'grade_id',
        'teacher_id',
        'is_active',
        
    
    ];

    
public function questions()
{
    return $this->hasMany(Question::class, 'quiz_id');
}

    public function quizClass()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function quizTeacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function quizGrade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }
}

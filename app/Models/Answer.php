<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable=[
        'quiz_id',
        'question_id',
        'selected_option_id',
        'student_id'
        

    ];

    public function student()
    {
        return $this->belongsTo(User::class,'student_id');
    }

    public function option()
    {
        return $this->belongsTo(Option::class, 'selected_option_id');
    }
    public function quiz()
    {
        return $this->belongsTo(Quizzes::class, 'quiz_id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}
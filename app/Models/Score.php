<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $fillable=[
        'quiz_id',
        'student_id'
    ];

    public function student()
    {
        return $this->belongsTo(User::class,'student_id');
    }
}
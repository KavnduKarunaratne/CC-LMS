<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable=[
        'assignment_name','subject_id','due_date','description','file','teacher_id','upload_date'
    ];

    public function subject(){
        
        return $this->belongsTo(Subject::class, 'subject_id');
    }
  
}

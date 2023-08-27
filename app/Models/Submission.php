<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Submission extends Model
{
    use HasFactory;

   protected  $fillable=[
       'name','description','file','assignment_id','student_id','submit_date'
   ];

   public function assignment(){
    
       return $this->belongsTo(Assignment::class, 'assignment_id');
   }

   public function submissions(){

        return $this->hasMany(Submission::class, 'student_id');
    }
    

    
    public function student(): BelongsTo{

        return $this->belongsTo(User::class, 'student_id');
    }

    public function feedback(){

        return $this->hasMany(Feedback::class, 'submission_id');
    }
}
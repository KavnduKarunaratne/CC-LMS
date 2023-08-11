<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $fillable=[
         'class_name','grade_id'
      
    ];

   /* public function subjects()
{
    return $this->hasManyThrough(Subject::class, Grade::class, 'id', 'grade_id')
            ->where('subjects.class_id', $this->id);

          
}*/
public function subjects()
{
    return $this->hasMany(Subject::class, 'class_id');
}
public function students()
{
    return $this->hasMany(User::class, 'class_id')->where('role_id', 3);
}

}

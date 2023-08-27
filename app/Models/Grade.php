<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable=[
        'grade',
      
    ];

    public function classes(){
        
        return $this->hasMany(Classes::class, 'grade_id');
    }

    public function notices(){

        return $this->hasMany(Notice::class);
    }
    public function students(){

        return $this->hasMany(User::class, 'grade_id')->where('role_id', 3);
    }

    
}

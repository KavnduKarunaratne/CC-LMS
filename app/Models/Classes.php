<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_name', 'grade_id'
    ];

    public function subjects()
    {
        return $this->hasMany(Subject::class, 'class_id');
    }

    public function students()
    {
        return $this->hasMany(User::class, 'class_id')->where('role_id', 3);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }
}

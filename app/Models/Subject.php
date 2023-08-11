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

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function materials()
{
    return $this->hasMany(Material::class, 'subject_id');
}
public function assignments()
{
    return $this->hasMany(Assignment::class, 'subject_id');

}

}

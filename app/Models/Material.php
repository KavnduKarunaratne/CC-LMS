<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable=[
        'material_name','subject_id','description','file','teacher_id','upload_date','link'
    ];
}

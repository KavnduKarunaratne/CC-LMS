<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class school_classes extends Model
{
    use HasFactory;

    protected $fillable=[
        'class_name','grade_id'
      
    ];
}

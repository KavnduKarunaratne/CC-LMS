<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    protected $fillable=[
        
        'notice',
        'date_of_notice',
        'grade_id',
       
    ];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}

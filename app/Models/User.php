<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password','role_id', 'admission_number', 'year_of_registration','class_id','grade_id','teacher_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function role()
{
    return $this->belongsTo(Role::class);
}

public function subjects()
{
    return $this->hasMany(Subject::class, 'teacher_id');
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
    return $this->belongsToMany(Material::class, 'material_user');
}

public function management()
{
  
    return $this->hasMany(Notice::class, 'management_id');
}

public function createdQuizzes()
    {
        return $this->hasMany(Quizzes::class, 'teacher_id');
    }

    public function createdCards(){
        return $this->hasMany(Flashcard::class, 'teacher_id');
    }

    public function submissions()
{
    return $this->hasMany(Submission::class, 'student_id');
}


}

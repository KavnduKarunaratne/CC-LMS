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

    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'admission_number', 'year_of_registration', 'class_id', 'grade_id', 'teacher_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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

    public function teachers()
    {
        return $this->hasMany(User::class);
    }

    public function materials()
    {
        return $this->belongsToMany(Material::class, 'material_user');
    }

    public function management()
    {
        return $this->hasMany(Notice::class, 'management_id');
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class, 'student_id');
    }

    public function assignedClass()
    {
        return $this->belongsTo(Classes::class, 'class_id')->with('grade');
    }
}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
// use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;


class Student extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    protected $table = 'students';
    protected $guard_name = 'student';

    protected $guarded = [
        'id'
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

    public function departement() {
        return $this->belongsTo(Departement::class, 'departement_id', 'id');
    }


    public function internshipsubmissions() {
        return $this->belongsToMany(InternshipSubmission::class, 'internshipsubmission_student', 'student_id', 'internshipsubmission_id');
    }
    

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('name', 'like', '%'.$query.'%')
                ->orWhere('nis', 'like', '%'.$query.'%')
                ->orWhere('email', 'like', '%'.$query.'%')
                ->orWhere('role_id', 'like', '%'.$query.'%')
                ->orWhere('jurusan_id', 'like', '%'.$query.'%');
    }
    
}

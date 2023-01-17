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

class Advisor extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    protected $table = 'advisors';
    protected $guard_name = 'advisor';

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
        return $this->belongsTo(Departement::class);
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function internshipsubmissions() {
        return $this->belongsToMany(InternshipSubmission::class, 'advisor_internshipsubmission', 'advisor_id', 'internshipsubmission_id');
    }
    

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('name', 'like', '%'.$query.'%')
                ->orWhere('nip', 'like', '%'.$query.'%')
                ->orWhere('email', 'like', '%'.$query.'%')
                ->orWhere('role_id', 'like', '%'.$query.'%')
                ->orWhere('jurusan_id', 'like', '%'.$query.'%');
    }
    
}

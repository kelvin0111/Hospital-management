<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\doctorDepartment;
use App\Models\Business_hour;
use App\Models\appointment;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'age',
        'gender',
        'country',
        'phone',
        'email_verified_at',
        'specialization',
        'address',
        'id_number',
        'active',
        'doctor',
        'password',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function doctorDepartments():HasMany
    {
        return $this->hasMany(doctorDepartment::class, 'doctor_id');
    }

    public function businessHours():HasMany
    {
        return $this->hasMany(Business_hour::class, 'doctor_id');
    }


    public function appointments():HasMany
    {
        return $this->hasMany(Appointment::class, 'user_id');
    }
    public function Payment():HasMany
    {
        return $this->hasMany(Payment::class, 'user_id');
    }

    // Relationship with the user who is a doctor
   
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MedicalDepartment;
use App\Models\User;
class doctorDepartment extends Model
{
    use HasFactory;
    protected $fillable =[
            'department_id', 'doctor_id', 'active',
    ];

    public function department()
    {
        return $this->belongsTo(MedicalDepartment::class, 'department_id');
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
    
}

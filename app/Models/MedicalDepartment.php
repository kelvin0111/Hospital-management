<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\doctorDepartment;

class MedicalDepartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'department',
        'active',
    ];

    public function doctorDepartments()
    {
        return $this->hasMany(doctorDepartment::class, 'department_id');
    }
    
}


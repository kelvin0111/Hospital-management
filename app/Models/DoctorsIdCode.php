<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorsIdCode extends Model
{
    use HasFactory;

    protected $fillable=[
            'doctor_id_code',
    ];

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;


class appointment extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'appointment_time'  => 'datetime'
    ];
    protected $fillable = [
        'title',
        'user_id',
        'doctor_id',
        'appointment_datetime',
        'appointment_date',
        'appointment_time',
        'status',
    ];

    // Define the relationship with the user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'doctor_id')->where('doctor', 1);
    }
}

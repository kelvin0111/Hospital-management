<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'doctor_id',
        'department_id',
        'payment_id',
        'title',
        'amount',
        'currency',
        'payment_status',
        'payment_method',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
  
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'doctor_id')->where('doctor', 1);
    }
}

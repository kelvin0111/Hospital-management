<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Carbon\CarbonInterval;

class Business_hour extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable =
    [
        'doctor_id',
        'day',
        'start_time',
        'end_time',
        'step',
        'off',
    ];

    Public function getTimesPeriodAttribute(){
        $times = CarbonInterval::minutes($this->step)->toPeriod($this->start_time, $this->end_time)->toArray();
        return array_map(fn($times)=> $times->format('H:i'), $times);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
}


<?php

namespace App\Listeners;

use App\Events\DoctorCreatedTime;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Business_hour;

class DoctorCreatedTimeListener
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(DoctorCreatedTime $event): void
    {
        $doctorId = $event->user->id; // Accessing the doctor from the event

        $daysOfWeek = ['Sunday','Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        $defaultStartTime = '09:00:00';
        $defaultEndTime = '17:00:00';
        $defaultStep = 30;
        $defaultOff = 0;

        foreach ($daysOfWeek as $day) {
            Business_hour::create([
                'doctor_id' => $doctorId,
                'day' => $day,
                'start_time' => $defaultStartTime,
                'end_time' => $defaultEndTime,
                'step' => $defaultStep,
                'off' => $defaultOff,
            ]);
        }
    }
}

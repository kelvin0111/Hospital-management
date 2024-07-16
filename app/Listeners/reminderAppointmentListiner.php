<?php

namespace App\Listeners;

use App\Events\reminderAppointment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class reminderAppointmentListiner
{
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
    public function handle(reminderAppointment $event): void
    {
        //
    }
}

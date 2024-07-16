<?php

namespace App\Listeners;

use App\Events\rescheduleAppointment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class rescheduleAppointmentListener
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
    public function handle(rescheduleAppointment $event): void
    {
        //
    }
}

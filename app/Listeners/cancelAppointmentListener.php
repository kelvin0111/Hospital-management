<?php

namespace App\Listeners;

use App\Events\cancelAppointment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class cancelAppointmentListener
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
    public function handle(cancelAppointment $event): void
    {
        //
    }
}

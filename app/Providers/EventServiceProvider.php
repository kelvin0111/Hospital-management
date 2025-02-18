<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\DoctorCreatedTime;
use App\Listeners\DoctorCreatedTimeListener;
use App\Listeners\SendAppointmentNotification;
use App\Events\NewAppointment;
use App\Events\cancelAppointment;
use App\Events\reminderAppointment;
use App\Events\rescheduleAppointment;
use App\Listeners\cancelAppointmentListener;
use App\Listeners\reminderAppointmentListiner;
use App\Listeners\rescheduleAppointmentListener;

class EventServiceProvider extends ServiceProvider
{

    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        DoctorCreatedTime::class => [
            DoctorCreatedTimeListener::class,
        ],
        NewAppointment::class => [
            SendAppointmentNotification::class,
        ],
        cancelAppointment::class => [
            cancelAppointmentListener::class,
        ],
        reminderAppointment::class => [
            reminderAppointmentListiner::class,
        ],
        rescheduleAppointment::class => [
            rescheduleAppointmentListener::class,
        ],

    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}

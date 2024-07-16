<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\appointment;

class RescheduleAppointmentNotification extends Notification
{
    use Queueable;

    protected $appointmentId;

    public function __construct($appointmentId)
    {
        $this->appointmentId = $appointmentId;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $appointment = appointment::find($this->appointmentId);

        return (new MailMessage)
            ->subject('Appointment Rescheduled')
            ->greeting('Hello ' . $notifiable->name)
            ->line('Your appointment has been rescheduled.')
            ->line('New Date: ' . $appointment->appointment_date)
            ->line('New Time: ' . $appointment->appointment_time)
            ->action('View Appointment', url('/appointments/' . $appointment->id));
    }
}

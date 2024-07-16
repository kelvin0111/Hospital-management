<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\appointment;

class AppointmentNotification extends Notification
{
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

        // Build the mail message using $appointment details

        return (new MailMessage)
            ->subject('New Appointment')
            ->greeting('Hello ' . $notifiable->name)
            ->line('You have a new appointment scheduled.')
            ->line('Appointment details:')
            ->line("Title: $appointment->title")
            ->line("Date: $appointment->appointment_date")
            ->line("Time: $appointment->appointment_time")
            ->action('View Appointment', url('/appointments/' . $appointment->id));
    }
}

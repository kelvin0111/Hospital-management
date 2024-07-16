<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\appointment;

class CancelAppointmentNotification extends Notification
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

        // Build the mail message for canceled appointment notification
        return (new MailMessage)
            ->subject('Canceled Appointment Notification')
            ->greeting('Hello ' . $notifiable->name)
            ->line('One of your appointments has been canceled.')
            ->line('Appointment details:')
            ->line("Title: $appointment->title")
            ->line("Date: $appointment->appointment_date")
            ->line("Time: $appointment->appointment_time");
    }
}

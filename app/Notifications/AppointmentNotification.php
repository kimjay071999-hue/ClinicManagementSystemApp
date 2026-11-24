<?php

namespace App\Notifications;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;

class AppointmentNotification extends Notification
{
    use Queueable;

    public function __construct(
        public Appointment $appointment,
        public string $event = 'created'
    ) {
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        $patient = $this->appointment->patient;

        $patientName = trim(
            ($patient?->first_name ?? '') . ' ' .
            ($patient?->last_name ?? '')
        );

        $message = match ($this->event) {
            'created' => 'A new appointment has been scheduled.',
            'updated' => 'An appointment has been updated.',
            'status_changed' => 'An appointment status has changed.',
            default => 'There is an appointment update.',
        };

        return [
            'title' => 'Appointment Notification',
            'message' => $message,
            'event' => $this->event,
            'appointment_id' => $this->appointment->id,
            'patient_name' => $patientName ?: 'Unknown Patient',
            'appointment_date' => Carbon::parse(
                $this->appointment->appointment_date
            )->format('M d, Y'),
            'appointment_time' => $this->appointment->appointment_time,
            'status' => $this->appointment->status,
        ];
    }
}
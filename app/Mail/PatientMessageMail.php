<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PatientMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $patientName;
    public string $patientEmail;
    public string $messageSubject;
    public string $messageText;

    public function __construct(
        string $patientName,
        string $patientEmail,
        string $messageSubject,
        string $messageText
    ) {
        $this->patientName = $patientName;
        $this->patientEmail = $patientEmail;
        $this->messageSubject = $messageSubject;
        $this->messageText = $messageText;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Patient Message: ' . $this->messageSubject,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.patient-message',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
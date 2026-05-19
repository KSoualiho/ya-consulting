<?php

namespace App\Mail;

use App\Models\Intervention;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InterventionAssigned extends Mailable
{
    use Queueable, SerializesModels;

    public $intervention;
    public $technicien;

    public function __construct(Intervention $intervention, User $technicien)
    {
        $this->intervention = $intervention;
        $this->technicien = $technicien;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nouvelle intervention assignée - YA Consulting',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.intervention-assigned',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
<?php

namespace App\Mail;

use App\Models\Rapport;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RapportValidated extends Mailable
{
    use Queueable, SerializesModels;

    public $rapport;
    public $technicien;

    public function __construct(Rapport $rapport, User $technicien)
    {
        $this->rapport = $rapport;
        $this->technicien = $technicien;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Rapport validé - ' . $this->rapport->intervention->numero,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.rapport-validated',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}

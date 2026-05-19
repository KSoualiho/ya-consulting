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

class RapportSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $rapport;
    public $manager;

    public function __construct(Rapport $rapport, User $manager)
    {
        $this->rapport = $rapport;
        $this->manager = $manager;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nouveau rapport en attente de validation - ' . $this->rapport->intervention->numero,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.rapport-submitted',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}

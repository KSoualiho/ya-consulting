<?php

namespace App\Mail;

use App\Models\Intervention;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InterventionStatusChanged extends Mailable
{
    use Queueable, SerializesModels;

    public $intervention;
    public $user;

    public function __construct(Intervention $intervention, User $user)
    {
        $this->intervention = $intervention;
        $this->user = $user;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Changement de statut - Intervention ' . $this->intervention->numero,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.status-changed',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}

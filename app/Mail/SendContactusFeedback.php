<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendContactusFeedback extends Mailable {

    use Queueable,
        SerializesModels;

    /**
     * Create a new message instance.
     */
    public $messagebox;

    public function __construct($messagebox) {
        $this->messagebox = $messagebox;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope {
        return new Envelope(
                subject: 'Reply Message',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content {
        return new Content(
                view: 'email.feedback',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array {
        return [];
    }

}

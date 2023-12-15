<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendContactusMail extends Mailable {

    use Queueable,
        SerializesModels;

    /**
     * Create a new message instance.
     */
    public $mailbox;

    public function __construct($mailbox) {
        $this->mailbox = $mailbox;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope {
        return new Envelope(
                subject: 'Contact Us Message',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content {
        return new Content(
                view: 'email.contactus',
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

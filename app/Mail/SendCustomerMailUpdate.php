<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendCustomerMailUpdate extends Mailable {

    use Queueable,
        SerializesModels;

    /**
     * Create a new message instance.
     */
    public $name;

    public function __construct($custname, $oldemail, ) {
        $this->name = $custname;
        $this->oldemail = $oldemail;
        $this->newemail = $newemail;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope {
        return new Envelope(
                subject: 'GYM Profile Activated',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content {
        return new Content(
                view: 'email.resetmail',
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

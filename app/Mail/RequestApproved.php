<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;

class RequestApproved extends Mailable
{
    use Queueable, SerializesModels;

    protected string $email;

    protected string $code;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        string $email,
        string $code
    ) {
        $this->email = $email;
        $this->code = $code;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address($this->email),
            subject: 'Request approved',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'emails.requests.request-approved',
            with: ['code' => $this->code]
        );
    }
}

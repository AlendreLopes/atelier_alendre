<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
    private $name;
    private $email;
    private $phone;
    private $message;
    /**
     * Create a new message instance.
     */
    public function __construct(public string $formName, public string $formEmail, public string $formPhone, public string $formMessage)
    {
        $this->name = $formName;
        $this->email = $formEmail;
        $this->phone = $formPhone;
        $this->message = $formMessage;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $this->subject('Sended by Site');
        $this->to(config('mail.from.address'), config('mail.from.name'));
        $this->replyTo($this->email, $this->name);
        return new Content(
            markdown: 'emails.contact',
            with: [
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'message' => $this->message,
                'url' => 'http://localhost',
            ],
        );
        // 'Html.view', $data, function ($message) {
        //     $message->from('john@johndoe.com', 'John Doe');
        //     $message->sender('john@johndoe.com', 'John Doe');
        //     $message->to('john@johndoe.com', 'John Doe');
        //     $message->cc('john@johndoe.com', 'John Doe');
        //     $message->bcc('john@johndoe.com', 'John Doe');
        //     $message->replyTo('john@johndoe.com', 'John Doe');
        //     $message->subject('Subject');
        //     $message->priority(3);
        //     $message->attach('pathToFile');
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
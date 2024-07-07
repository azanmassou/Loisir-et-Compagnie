<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class VerificationRegisterEmail extends Mailable
{
    use Queueable, SerializesModels;

    // public $user;

    /**
     * Create a new message instance.
     */
    

    // public function __construct(User $user)
    // {
    //     // $this->user = $user;
        
    // }


     /**
     * Create a new message instance.
     */
    public function __construct(
        public User $user,
    ) {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('azanmassouhappylouis@gmail.com', 'Azanmassou Happy'),
            subject: 'Verification Register Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.auth.register',
            with: [
                'name' => $this->user->name,
                'email_verified_token' => $this->user->email_verified_token,
            ],
        );
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

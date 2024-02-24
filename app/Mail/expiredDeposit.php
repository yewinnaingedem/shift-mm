<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class expiredDeposit extends Mailable
{
    use Queueable, SerializesModels;
    
    public $car ;

    public function __construct(array $car )
    {
        $this->car = $car ;
    }

    
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Report: Expired Data in Car',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'Admin.Mail.mail',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}

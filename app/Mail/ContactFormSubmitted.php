<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactFormSubmitted extends Mailable
{
    use Queueable, SerializesModels;
    public $myRequest;

    /**
     * Create a new message instance.
     *
     * @param $myRequest
     */
    public function __construct($myRequest)
    {
        $this->myRequest = $myRequest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $adminEmail = 'operations@theportlandcompany.com';
        return $this->from($adminEmail)
                    ->subject("You've got a new contact message through fixpaypal.com")
                    ->view('emails.contact-submitted')
                    ->with([
                        'name' => $this->myRequest->input('name'),
                        'email' => $this->myRequest->input('email'),
                        'content' => $this->myRequest->input('message'),
                    ]);
    }
}

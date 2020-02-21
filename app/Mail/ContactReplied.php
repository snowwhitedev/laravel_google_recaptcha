<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactReplied extends Mailable
{
    use Queueable, SerializesModels;
    private $content;
    private $name;

    /**
     * Create a new message instance.
     *
     * @param $name
     * @param $content
     */
    public function __construct($name, $content)
    {
        $this->content = $content;
        $this->name = $name;
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
            ->subject("You've got a new reply to your message at fixpaypal.com")
            ->view('emails.contact-replied')
            ->with([
                'name' => $this->name,
                'content' => $this->content,
            ]);
    }
}

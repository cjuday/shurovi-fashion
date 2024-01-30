<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name, $subject, $body, $mail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $mail, $subject, $body)
    {
        $this->name = $name;
        $this->mail = $mail;
        $this->subject = $subject;
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.contact')->with(['name',$this->name],['mail' => $this->mail],['subject' => $this->subject],['body' => $this->body]);
    }
}

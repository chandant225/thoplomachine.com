<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ServiceOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $mesg, $email, $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $subject, $mesg)
    {
        $this->mesg = $mesg;
        $this->subject = $subject;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject($this->subject)
            ->to($this->email)
            ->view('mail.service-order');
    }
}
<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordReset extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Restablecimiento de contraseña';
    public $t;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($to)
    {
        $this->t = $to;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.mail');
    }
}

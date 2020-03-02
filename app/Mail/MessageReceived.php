<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageReceived extends Mailable
{
    use Queueable, SerializesModels;



//MAIL_DRIVER=smtp
// MAIL_HOST=mail.espacioindustria.cl
// MAIL_PORT=587
// MAIL_USERNAME=soporte@espacioindustria.cl
// MAIL_PASSWORD=proyectoCidere
// MAIL_ENCRYPTION=tls
// MAIL_FROM_ADDRESS=soporte@espacioindustria.cl
// MAIL_FROM_NAME='Espacio Industrial Minero'

    public $subject = '¡Hiciste MATCH!';
    public $frm;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($from)
    {
        $this->frm = $from;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.welcome');
    }
}

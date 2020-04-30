<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = '¡Alguien Necesita Soporte!';

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public $ru;
     public $nom;
     public $cor;
     public $msj;

    public function __construct($ru,$nom,$cor,$msj)
    {
        $this->ru = $ru;
        $this->nom = $nom;
        $this->cor = $cor;
        $this->msj = $msj;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('mails.contact');
    }
}

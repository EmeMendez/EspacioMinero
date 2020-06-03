<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Notification extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = '¡Alguien se ha registrado en Espacio Indsutrial Minero!';

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public $ru;
     public $nom;
     public $cor;

    public function __construct($ru,$nom,$cor)
    {
        $this->ru = $ru;
        $this->nom = $nom;
        $this->cor = $cor;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('mails.notificacion');
    }
}

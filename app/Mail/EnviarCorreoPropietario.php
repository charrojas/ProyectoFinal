<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnviarCorreoPropietario extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $correoRemitente;

    public function __construct($data)
    {
        $this->data = $data;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.enviar_correo_propietario')
            ->subject('Correo para el propietario del vehículo');
    }
}

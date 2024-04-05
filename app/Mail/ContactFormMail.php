<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{

    use Queueable, SerializesModels;

    public $data;
    public $correoRemitente;

    public function __construct($data, $correoRemitente)
    {
        $this->data = $data;
        $this->correoRemitente = $correoRemitente;
    }
    
    public function build()
    {
        return $this->view('emails.contacto')
                    ->subject('Asunto del correo')
                    ->from($this->correoRemitente)
                    ->to('charrojas2000@gmail.com');
    }
    
}

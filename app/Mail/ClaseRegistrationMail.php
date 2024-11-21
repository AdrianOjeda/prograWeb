<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class ClaseRegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $alumno;
    public $clase;

    /**
     * Create a new message instance.
     *
     * @param $alumno
     * @param $clase
     */
    public function __construct($alumno, $clase)
    {
        $this->alumno = $alumno;
        $this->clase = $clase;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Registro en Clase')
                    ->view('emails.clase_registration');
    }
}
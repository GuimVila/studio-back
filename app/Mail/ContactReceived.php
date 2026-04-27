<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ContactReceived extends Mailable
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this
            ->subject('Nou contacte des de la web')
            ->view('contact');
    }
}

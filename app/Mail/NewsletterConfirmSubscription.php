<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class NewsletterConfirmSubscription extends Mailable
{
    public $subscriber;

    public function __construct($subscriber)
    {
        $this->subscriber = $subscriber;
    }

    public function build()
    {
        return $this
            ->subject('Confirma la teva subscripció')
            ->view('confirm');
    }
}

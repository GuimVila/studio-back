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
        $confirmationUrl = rtrim(config('app.frontend_url'), '/')
            . '/subscribe/confirmed?token='
            . urlencode($this->subscriber->confirmation_token);

        return $this
            ->subject('Confirma la teva subscripció')
            ->view('confirm')
            ->with([
                'confirmationUrl' => $confirmationUrl,
            ]);
    }
}

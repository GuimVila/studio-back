<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use App\Models\NewsletterSubscriber;

class NewsletterNewResource extends Mailable
{
    public NewsletterSubscriber $subscriber;
    public array $resource;

    public function __construct(NewsletterSubscriber $subscriber, array $resource)
    {
        $this->subscriber = $subscriber;
        $this->resource = $resource;
    }

    public function build()
    {
        return $this
            ->subject('Nou recurs publicat: ' . $this->resource['title'])
            ->view('newsletter-new-resource');
    }
}

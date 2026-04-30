<?php

namespace Tests\Feature;

use App\Mail\NewsletterConfirmSubscription;
use App\Models\NewsletterSubscriber;
use Tests\TestCase;

class NewsletterConfirmMailTest extends TestCase
{
    public function test_confirmation_mail_contains_visible_frontend_confirmation_link(): void
    {
        config(['app.frontend_url' => 'https://guillemvila.com']);

        $subscriber = new NewsletterSubscriber([
            'confirmation_token' => 'abc123',
        ]);

        $html = (new NewsletterConfirmSubscription($subscriber))->render();

        $this->assertStringContainsString('Confirmar subscripció', $html);
        $this->assertStringContainsString('https://guillemvila.com/subscribe/confirmed?token=abc123', $html);
        $this->assertStringContainsString('Si el botó no funciona', $html);
    }
}

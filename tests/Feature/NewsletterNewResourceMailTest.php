<?php

namespace Tests\Feature;

use App\Mail\NewsletterNewResource;
use App\Models\NewsletterSubscriber;
use Tests\TestCase;

class NewsletterNewResourceMailTest extends TestCase
{
    public function test_new_resource_mail_contains_resource_button_and_unsubscribe_link(): void
    {
        config(['app.url' => 'https://api.guillemvila.com']);

        $subscriber = new NewsletterSubscriber([
            'unsubscribe_token' => 'unsubscribe123',
        ]);

        $resource = [
            'title' => 'Guia de mescla',
            'excerpt' => 'Una guia practica per millorar les teves mescles.',
            'url' => 'https://guillemvila.com/resources/mescla/guia',
        ];

        $html = (new NewsletterNewResource($subscriber, $resource))->render();

        $this->assertStringContainsString('Nou recurs publicat', $html);
        $this->assertStringContainsString('Guia de mescla', $html);
        $this->assertStringContainsString('Llegir recurs', $html);
        $this->assertStringContainsString('https://guillemvila.com/resources/mescla/guia', $html);
        $this->assertStringContainsString('https://api.guillemvila.com/api/newsletter/unsubscribe/unsubscribe123', $html);
    }
}

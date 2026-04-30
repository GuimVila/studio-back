<?php

namespace Tests\Feature;

use App\Mail\ContactReceived;
use Tests\TestCase;

class ContactReceivedMailTest extends TestCase
{
    public function test_contact_mail_contains_message_details_and_reply_button(): void
    {
        $data = [
            'name' => 'Guillem Test',
            'email' => 'test@example.com',
            'phone' => '+34 600 000 000',
            'service' => 'mescla',
            'message' => 'Vull parlar sobre una sessio de mescla.',
        ];

        $html = (new ContactReceived($data))->render();

        $this->assertStringContainsString('Nou contacte web', $html);
        $this->assertStringContainsString('Guillem Test', $html);
        $this->assertStringContainsString('test@example.com', $html);
        $this->assertStringContainsString('Respondre', $html);
    }
}

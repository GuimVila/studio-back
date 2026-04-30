<?php

namespace Tests\Feature;

use App\Mail\ContactReceived;
use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_form_stores_contact_and_sends_mail_before_success_response(): void
    {
        Mail::fake();

        $payload = [
            'name' => 'Guillem Vila',
            'email' => 'guillem@example.com',
            'phone' => '+34 600 000 000',
            'service' => 'mescla',
            'message' => 'Vull parlar sobre una sessio de mescla amb prou detall.',
        ];

        $this->postJson('/api/contact', $payload)
            ->assertCreated()
            ->assertJson([
                'success' => true,
            ]);

        $this->assertDatabaseHas(Contact::class, [
            'email' => 'guillem@example.com',
            'phone' => '+34 600 000 000',
            'service' => 'mescla',
        ]);

        Mail::assertSent(ContactReceived::class, function (ContactReceived $mail) use ($payload) {
            return $mail->hasTo(config('mail.from.address'))
                && $mail->data === $payload;
        });
    }
}

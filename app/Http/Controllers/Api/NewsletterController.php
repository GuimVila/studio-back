<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsletterSubscriber;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterConfirmSubscription;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $email = $request->email;

        // Busquem si ja existeix
        $subscriber = NewsletterSubscriber::where('email', $email)->first();

        if ($subscriber && $subscriber->is_confirmed) {
            return response()->json([
                'success' => true,
                'message' => 'Ja estàs subscrit'
            ]);
        }

        // Generem token
        $token = Str::random(64);

        $data = [
            'confirmation_token' => $token,
            'confirmation_expires_at' => Carbon::now()->addHours(24),
            'confirmation_last_sent_at' => Carbon::now(),
        ];

        if ($subscriber) {
            $subscriber->update($data + [
                'confirmation_sent_count' => $subscriber->confirmation_sent_count + 1,
            ]);
        } else {
            $subscriber = NewsletterSubscriber::create($data + [
                'email' => $email,
                'unsubscribe_token' => Str::random(64),
                'confirmation_sent_count' => 1,
            ]);
        }

        // Enviar email
        Mail::to($email)->send(new NewsletterConfirmSubscription($subscriber));

        return response()->json([
            'success' => true,
            'message' => 'Revisa el teu correu per confirmar la subscripció'
        ]);
    }

    public function confirm(string $token)
    {
        $subscriber = NewsletterSubscriber::where('confirmation_token', $token)->first();

        if (! $subscriber) {
            return response()->json([
                'success' => false,
                'message' => 'Token de confirmació invàlid.',
            ], 404);
        }

        if ($subscriber->confirmation_expires_at && $subscriber->confirmation_expires_at->isPast()) {
            return response()->json([
                'success' => false,
                'message' => 'El token de confirmació ha caducat.',
            ], 410);
        }

        $subscriber->update([
            'is_confirmed' => true,
            'confirmed_at' => now(),
            'confirmation_token' => null,
            'confirmation_expires_at' => null,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Subscripció confirmada correctament.',
        ]);
    }

    public function unsubscribe(string $token)
    {
        $subscriber = NewsletterSubscriber::where('unsubscribe_token', $token)->first();

        if (! $subscriber) {
            return response()->json([
                'success' => false,
                'message' => 'Token de baixa invàlid.',
            ], 404);
        }

        $subscriber->update([
            'unsubscribed_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'T’has donat de baixa correctament.',
        ]);
    }
}

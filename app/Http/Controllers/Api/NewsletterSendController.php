<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewsletterNewResource;
use App\Models\NewsletterSend;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsletterSendController extends Controller
{
    public function sendNewResource(Request $request)
    {
        if (! $request->user() || ! $request->user()->is_admin) {
            return response()->json([
                'message' => 'Forbidden',
            ], 403);
        }

        $validated = $request->validate([
            'resource_key' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['required', 'string', 'max:1000'],
            'url' => ['required', 'url', 'max:2048'],
        ]);

        if (NewsletterSend::where('resource_key', $validated['resource_key'])->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Aquest recurs ja s’ha enviat.',
            ], 409);
        }

        $subscribers = NewsletterSubscriber::where('is_confirmed', true)
            ->whereNull('unsubscribed_at')
            ->get();

        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)
                ->queue(new NewsletterNewResource($subscriber, $validated));
        }

        $send = NewsletterSend::create([
            'resource_key' => $validated['resource_key'],
            'title' => $validated['title'],
            'url' => $validated['url'],
            'sent_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'sent_to' => $subscribers->count(),
            'data' => $send,
        ]);
    }
}

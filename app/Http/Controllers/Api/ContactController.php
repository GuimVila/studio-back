<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ContactReceived;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ContactController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'service' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        $contact = Contact::create($validated);

        try {
            Mail::to(config('mail.from.address'))
                ->send(new ContactReceived($validated));
        } catch (Throwable $exception) {
            Log::error('Contact mail delivery failed.', [
                'contact_id' => $contact->id,
                'exception' => $exception,
            ]);

            return response()->json([
                'success' => false,
                'message' => 'No s’ha pogut enviar el contacte. Si us plau, intenta-ho de nou o contacta per email.',
            ], 500);
        }

        return response()->json([
            'success' => true,
            'data' => $contact,
        ], 201);
    }
}

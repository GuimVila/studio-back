<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ReadingProgress;
use Illuminate\Http\Request;

class ReadingProgressController extends Controller
{

    public function index(Request $request)
    {
        $progress = $request->user()
            ->readingProgress()
            ->get();

        return response()->json([
            'data' => $progress
        ]);
    }

    public function markAsRead(Request $request)
    {
        $validated = $request->validate([
            'content_type' => ['required', 'string'],
            'content_key' => ['required', 'string'],
        ]);

        $user = $request->user(); // vindrà amb auth després

        $progress = ReadingProgress::updateOrCreate(
            [
                'user_id' => $user->id,
                'content_type' => $validated['content_type'],
                'content_key' => $validated['content_key'],
            ],
            [
                'is_read' => true,
            ]
        );

        return response()->json([
            'success' => true,
            'data' => $progress,
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'content_type' => ['required', 'string'],
            'content_key' => ['required', 'string'],
            'is_read' => ['required', 'boolean'],
        ]);

        $progress = ReadingProgress::updateOrCreate(
            [
                'user_id' => $request->user()->id,
                'content_type' => $validated['content_type'],
                'content_key' => $validated['content_key'],
            ],
            [
                'is_read' => $validated['is_read'],
            ]
        );

        return response()->json([
            'success' => true,
            'data' => $progress,
        ]);
    }
}

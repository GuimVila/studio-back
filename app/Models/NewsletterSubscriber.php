<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsletterSubscriber extends Model
{
    protected $fillable = [
        'email',
        'is_confirmed',
        'confirmation_token',
        'confirmation_expires_at',
        'confirmed_at',
        'unsubscribe_token',
        'unsubscribed_at',
        'confirmation_sent_count',
        'confirmation_last_sent_at',
        'language',
        'source',
    ];

    protected $casts = [
        'is_confirmed' => 'boolean',
        'confirmation_expires_at' => 'datetime',
        'confirmed_at' => 'datetime',
        'unsubscribed_at' => 'datetime',
        'confirmation_last_sent_at' => 'datetime',
    ];
}

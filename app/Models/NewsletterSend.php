<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsletterSend extends Model
{
    protected $fillable = [
        'resource_key',
        'title',
        'url',
        'sent_at',
    ];

    protected $casts = [
        'sent_at' => 'datetime',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReadingProgress extends Model
{
    protected $fillable = [
        'user_id',
        'content_type',
        'content_key',
        'is_read',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}

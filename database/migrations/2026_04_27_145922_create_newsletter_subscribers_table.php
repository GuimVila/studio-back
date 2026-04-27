<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('newsletter_subscribers', function (Blueprint $table) {
            $table->id();

            $table->string('email')->unique();

            $table->boolean('is_confirmed')->default(false);

            $table->string('confirmation_token')->nullable();
            $table->timestamp('confirmation_expires_at')->nullable();
            $table->timestamp('confirmed_at')->nullable();

            $table->string('unsubscribe_token')->unique()->nullable();
            $table->timestamp('unsubscribed_at')->nullable();

            $table->integer('confirmation_sent_count')->default(0);
            $table->timestamp('confirmation_last_sent_at')->nullable();

            $table->string('language')->nullable();
            $table->string('source')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('newsletter_subscribers');
    }
};

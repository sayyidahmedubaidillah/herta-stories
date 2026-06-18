<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::create('song_requests', function (Blueprint $table) {
        $table->id();

        $table->string('queue_code')->unique();

        $table->string('requester_name');

        $table->string('song_title');

        $table->string('artist_name');

        $table->enum('mood', [
            'happy',
            'relaxed',
            'nostalgic',
            'in_love',
            'energetic',
            'reflective',
            'sad',
            'heartbroken'
        ]);

        $table->text('message')->nullable();

        $table->enum('status', [
            'queued',
            'playing',
            'played',
            'cancelled'
        ])->default('queued');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('song_requests');
    }
};

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
        Schema::create('playlist_songs', function (Blueprint $table) {
            $table->unsignedBigInteger('playlist_ID');
            $table->unsignedBigInteger('song_ID');
            $table->foreign('playlist_ID')->references('playlist_ID')->on('playlists');
            $table->foreign('song_ID')->references('song_ID')->on('songs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('playlist_songs');
    }
};

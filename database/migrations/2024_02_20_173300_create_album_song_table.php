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
        Schema::create('album_song', function (Blueprint $table) {
            $table->unsignedBigInteger('album_ID');
            $table->unsignedBigInteger('song_ID');
            $table->unsignedBigInteger('user_ID')->nullable();
            $table->foreign('album_ID')->references('album_ID')->on('albums');
            $table->foreign('song_ID')->references('song_ID')->on('songs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('album_song');
    }
};

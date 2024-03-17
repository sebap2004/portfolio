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
        Schema::create('songs', function (Blueprint $table) {
            $table->id('song_ID');
            $table->string('song_name', 255)->nullable(false);
            $table->string('artist_name', 255)->nullable(false);
            $table->string('song_directory', 255)->nullable(false);
            $table->string('cover_directory', 255)->nullable(false);
            $table->unsignedBigInteger('artist_ID')->nullable();
            $table->unsignedBigInteger('album_ID')->nullable();
            $table->unsignedBigInteger('genre_ID')->nullable();
            $table->foreign('album_ID')->references('album_ID')->on('albums');
            $table->foreign('genre_ID')->references('genre_ID')->on('genres');
            $table->foreign('artist_ID')->references('artist_ID')->on('artists');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};

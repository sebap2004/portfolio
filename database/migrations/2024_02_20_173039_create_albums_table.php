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
        Schema::create('albums', function (Blueprint $table) {
            $table->id('album_ID');
            $table->string('album_name', 30)->nullable(false);
            $table->string('album_slug', 30)->nullable(false);
            $table->string('cover_directory', 255)->nullable(false);
            $table->unsignedBigInteger('artist_ID');
            $table->foreign('artist_ID')->references('artist_ID')->on('artists');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('albums');
    }
};

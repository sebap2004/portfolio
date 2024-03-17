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
        Schema::create('artists', function (Blueprint $table) {
            $table->id('artist_ID');
            $table->string('name', 50);
            $table->string('username', 50);
            $table->string('pfp_directory', 255)->nullable();
            $table->string('bio', 255)->nullable();
            $table->unsignedBigInteger('user_ID')->nullable();
            $table->foreign('user_ID')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artists');
    }
};

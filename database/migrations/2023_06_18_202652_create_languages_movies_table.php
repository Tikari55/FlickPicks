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
        Schema::create('languages_movies', function (Blueprint $table) {
            $table->unsignedBigInteger('languages_id');
            $table->unsignedBigInteger('movies_id');
            $table->foreign('languages_id')->references('id')->on('languages')->onDelete('cascade');
            $table->foreign('movies_id')->references('id')->on('movies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('languages_movies');
    }
};

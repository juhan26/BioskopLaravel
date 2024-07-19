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
        Schema::create('dateshowtimes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movie_id')->constrained();
            $table->foreignId('date_id')->constrained();
            $table->foreignId('showtime_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dateshowtimes');
    }
};

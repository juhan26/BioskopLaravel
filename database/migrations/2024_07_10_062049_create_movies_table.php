<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
            Schema::create('movies', function (Blueprint $table) {
                $table->id();
                $table->string('title')->unique();
                $table->foreignId('studio_id')->constrained();
                $table->text('description');
                $table->date('release_date');
                $table->date('expired_date');
                $table->string('genre');
                $table->string('poster_url');
                $table->string('age_rating');
                $table->bigInteger('ticket_price');
                $table->timestamps();
            });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};


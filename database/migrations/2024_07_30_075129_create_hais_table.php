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
        if(Schema::hasColumn('movies', 'expired_date')){
            Schema::table('movies', function (Blueprint $table) {
                $table->date('expired_date')->nullable()->change();
            });
        } 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hais');
    }
};

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
        Schema::create('user_in_tournaments', function (Blueprint $table) {
            $table->id();
            
            // Corrected to unsignedBigInteger for foreign keys
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tournament_id');

            // Foreign keys with onDelete cascade
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('tournament_id')->references('id')->on('tournaments')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_in_tournaments');
    }
};

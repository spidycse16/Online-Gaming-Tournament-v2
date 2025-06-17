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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // User name
            $table->string('email'); // User email
            $table->string('phone'); // User phone
            $table->text('address'); // User address
            $table->decimal('amount', 10, 2);
            $table->string('transaction_id')->unique();
            $table->string('currency');
            $table->enum('status', ['Pending', 'Processing', 'Complete', 'Failed'])->default('Pending');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->foreignId('tournament_id')->constrained()->onDelete('cascade');
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

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
        Schema::create('payments', function (Blueprint $table) {
            $table->id('payment_id');
            $table->foreignId('rental_id')->constrained('rentals', 'rental_id')->onDelete('cascade');
            $table->decimal('amount_paid', 10, 2);
            $table->enum('payment_method', ['Cash', 'Credit Card', 'Online']);
            $table->timestamp('payment_date')->useCurrent()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};

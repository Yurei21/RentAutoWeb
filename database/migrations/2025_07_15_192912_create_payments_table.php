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
            $table->id();
            $table->foreignId('rental_id')->constrained('rentals')->onDelete('cascade');
            $table->decimal('amount_paid', '10', '2');
            $table->enum('payment_method', ['Cash', 'Credit Card', 'Online']);
            $table->timestamp('payment_date')->nullable();
            $table->enum('pay_status', ['Paid', 'Pending'])->default('pending');
            $table->decimal('additionalOrLate_fee', 10, 2);
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

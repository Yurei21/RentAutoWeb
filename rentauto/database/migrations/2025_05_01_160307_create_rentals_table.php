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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id('rental_id');
            $table->foreignId('user_id')->constrained('users', 'user_id')->onDelete('cascade');
            $table->foreignId('vehicle_id')->constrained('vehicles', 'vehicle_id')->onDelete('cascade');
            $table->timestamp('rental_start_date');
            $table->timestamp('rental_end_date');
            $table->enum('payment_status', ['Pending', 'Paid'])->default('Paid');
            $table->enum('status', ['Ongoing','Completed'])->default('Ongoing');
            $table->enum('carstatus', ['In-use', 'Returned'])->default('In-use');
            $table->integer('barcode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};

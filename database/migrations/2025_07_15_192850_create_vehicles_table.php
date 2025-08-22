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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->string('brand');
            $table->decimal('rent_price', '10', '2');
            $table->enum('availability_status', ['Available', 'Rented', 'Under Maintenance'])->default('Available');
            $table->string('license_plate');
            $table->string('car_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};

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
        Schema::create('package_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_tour_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('quantity');
            $table->date('Start_date');
            $table->date('end_date');
            $table->unsignedBigInteger('total_amount');
            $table->boolean('is_paid');
            $table->foreignId('package_bank_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('sub_total');
            $table->unsignedBigInteger('insurance');
            $table->unsignedBigInteger('tax');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_bookings');
    }
};

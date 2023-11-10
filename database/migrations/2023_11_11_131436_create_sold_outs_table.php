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
        Schema::create('sold_outs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_id');
            $table->unsignedBigInteger('buyer_id');
            $table->unsignedBigInteger('hire_purchase_id');
            $table->unsignedBigInteger('broker_id')->nullable();
            $table->timestamps();

            $table->foreign('car_id')->references('id')->on('cars');
            $table->foreign('buyer_id')->references('id')->on('buyers');
            $table->foreign('hire_purchase_id')->references('id')->on('hire_purchases');
            $table->foreign('broker_id')->references('id')->on('brokers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sold_outs');
    }
};

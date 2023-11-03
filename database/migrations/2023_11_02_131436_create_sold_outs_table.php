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
            $table->string('buyer');
            $table->string('price_of_ori');
            $table->string('purchase_price');
            $table->string('hp_plane');
            $table->string('lenght_of_loan')->nullabel();
            $table->string('broker_fee')->nullable();
            $table->string('broker_name')->nullable();
            $table->timestamps();

            $table->foreign('car_id')->references('id')->on('cars');
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

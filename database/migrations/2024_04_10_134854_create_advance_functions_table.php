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
        Schema::create('advance_functions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seat_id');
            $table->unsignedBigInteger('sun_roof_id');
            $table->unsignedBigInteger('sonor_id');
            $table->unsignedBigInteger('key_id');
            $table->unsignedBigInteger('aircon_id');
            $table->unsignedBigInteger('motor_id');
            $table->unsignedBigInteger('transmission_id');
            $table->unsignedBigInteger('camera_id');
            $table->unsignedBigInteger('divertrim_id');
            $table->timestamps();

            $table->foreign('seat_id')->references('id')->on('seats');
            $table->foreign('sun_roof_id')->references('id')->on('sun_roofs');
            $table->foreign('sonor_id')->references('id')->on('sonors');
            $table->foreign('key_id')->references('id')->on('keys');
            $table->foreign('aircon_id')->references('id')->on('aircons');
            $table->foreign('motor_id')->references('id')->on('motors');
            $table->foreign('transmission_id')->references('id')->on('transmissions');
            $table->foreign('divertrim_id')->references('id')->on('divertrims');
            $table->foreign('camera_id')->references('id')->on('cameras');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advance_functions');
    }
};

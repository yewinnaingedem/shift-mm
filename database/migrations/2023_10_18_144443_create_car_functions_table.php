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
        Schema::create('car_functions', function (Blueprint $table) {
            $table->id();
            $table->boolean('blind_sport')->default(false);
            $table->boolean('lane_keep_assit')->default(false);
            $table->boolean('auto_headlight')->default(false);
            $table->boolean('rain_sensor')->default(false);
            $table->boolean('auto_hold')->default(false);
            $table->boolean('tire_pressure')->default(false);
            $table->boolean('kick_sensor')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_functions');
    }
};

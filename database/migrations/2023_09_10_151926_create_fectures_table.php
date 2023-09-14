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
        Schema::create('fectures', function (Blueprint $table) {
            $table->id();
            $table->string('curise_control');
            $table->string('lane_depurature');
            $table->string('streeing_volue');
            $table->string('ac');
            $table->string('rounded_ac');
            $table->string('key');
            $table->string('sun_roof');
            $table->string('transmission');
            $table->string('VIN');
            $table->string('wheel');
            $table->string('auto_headlight');
            $table->string('rain_sensor');
            $table->string('blind_sport');
            $table->string('auto_em_b');
            $table->string('abs');
            $table->string('auto_hold');
            $table->string('tire_pressure');
            $table->string('360_camera');
            $table->string('truck_motor');
            $table->string('kick_sensor');
            $table->string('sonor');
            $table->string('type');
            $table->string('interior_color');
            $table->unsignedBigInteger('seates');
            $table->foreign('seates')->references('id')->on('seats');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fectures');
    }
};

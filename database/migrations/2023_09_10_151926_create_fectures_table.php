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
            $table->unsignedBigInteger('ac_id');
            $table->string('key');
            $table->string('sun_roof');
            $table->string('transmission');
            $table->string('VIN');
            $table->string('2_wheel');
            $table->string('4_wheel');
            $table->string('all_wheel');
            $table->string('auto_headlight');
            $table->string('rain_sensor');
            $table->string('blind_sport');
            $table->string('auto_em_b');
            $table->string('abs');
            $table->string('color');
            $table->unsignedBigInteger('seates');


            $table->foreign('ac_id')->references('id')->on('aricons');
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

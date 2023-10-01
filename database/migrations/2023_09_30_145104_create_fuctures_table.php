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
        Schema::create('fuctures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('modal_name');
            $table->boolean('blind_sprot')->default(false);
            $table->boolean('lane_keep_assit')->default(false);
            $table->boolean('rounded_ac')->default(false);
            $table->boolean('auto_headlight')->default(false);
            $table->boolean('rain_sensor')->default(false);
            $table->boolean('auto_em_br')->default(false);
            $table->boolean('auto_hold')->default(false);
            $table->boolean('abs')->default(true);
            $table->boolean('tire_prssure')->default(false);
            $table->string('seat_leather')->defaule('simple');
            $table->boolean('truck_motor')->default(false);
            $table->string('key')->default('simple');
            $table->string('sun_roof')->default(null);
            $table->string('senor')->default('back');
            $table->timestamps();
            
            $table->foreign('modal_name')->references('id')->on('modals');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fuctures');
    }
};

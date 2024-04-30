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
        Schema::create('owner_books', function (Blueprint $table) {
            $table->id();
            $table->string('vin');
            $table->unsignedBigInteger('exterior_color_id');
            $table->unsignedBigInteger('year_id');
            $table->unsignedBigInteger('model_id');
            $table->unsignedBigInteger('license_state');
            $table->string('license_plate');
            $table->string('pass_owner');
            $table->unsignedBigInteger('transmission_type');
            $table->string('engine_exception')->nullable();
            $table->string('license_exception')->nullable();
            $table->string('exception')->nullable();
            $table->timestamps();
            
            $table->foreign('model_id')->references('id')->on('car_models');
            $table->foreign('year_id')->references('id')->on('years');
            
            $table->foreign('exterior_color_id')->references('id')->on('exterior_colors');
            $table->foreign('transmission_type')->references('id')->on('transmission_types');
            $table->foreign('license_state')->references('id')->on('license_states');
        });
    }

    /** 
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owner_books');
    }
};

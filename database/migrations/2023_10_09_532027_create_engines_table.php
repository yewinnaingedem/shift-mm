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
        Schema::create('engines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Cylinder_id');
            $table->unsignedBigInteger('Fuel');
            $table->unsignedBigInteger('engine_power_id');
            $table->boolean('Turbo');
            $table->timestamps();

            $table->foreign('Cylinder_id')->references('id')->on('cylinders');
            $table->foreign('engine_power_id')->references('id')->on('engine_powers');
            $table->foreign('Fuel')->references('id')->on('engine_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('engines');
    }
};

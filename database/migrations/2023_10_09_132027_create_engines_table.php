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
            $table->string('Engine_power');
            $table->unsignedBigInteger('Cylinder_id');
            $table->unsignedBigInteger('Fuel');
            $table->unsignedBigInteger('transmission_type');
            $table->boolean('Turbo');
            $table->timestamps();

            $table->foreign('Cylinder_id')->references('id')->on('cylinders');
            $table->foreign('Fuel')->references('id')->on('engine_types');
            $table->foreign('transmission_type')->references('id')->on('transmission_types');
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

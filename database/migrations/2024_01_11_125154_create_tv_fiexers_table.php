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
        Schema::create('tv_fiexers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fixer_id');
            $table->unsignedBigInteger('car_id');
            $table->string('description');
            $table->boolean('state')->default(0);
            $table->timestamps();

            $table->foreign('fixer_id')->references('id')->on('machines');
            $table->foreign('car_id')->references('id')->on('cars');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tv_fiexers');
    }
};

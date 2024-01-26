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
        Schema::create('pandings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_id');
            $table->timestamps();
            $table->boolean('state')->default(0);
            $table->foreign('car_id')->references('id')->on('cars');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pandings');
    }
};

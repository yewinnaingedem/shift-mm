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
        Schema::create('exceptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_id');
            $table->text('engine_malfunction');
            $table->text('paint_demage');
            $table->text('tv');
            $table->text('suspection');
            $table->text('lights');
            $table->text('addition_exception')->nullable();
            $table->timestamps();

            $table->foreign('car_id')->references('id')->on('cars');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exceptions');
    }
};

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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('carModel_id');
            $table->string('grade');
            $table->unsignedBigInteger('default_function_id') ;
            $table->timestamps();
            $table->foreign('carModel_id')->references('id')->on('car_models');
            $table->foreign('default_function_id')->references('id')->on('default_functions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};

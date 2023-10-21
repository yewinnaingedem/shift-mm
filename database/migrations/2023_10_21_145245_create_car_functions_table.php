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
        Schema::create('car_functions', function (Blueprint $table) {
            $table->unsignedBigInteger('grade_id');
            $table->unsignedBigInteger('car_detail_id');

            $table->foreign('grade_id')->references('id')->on('grades');
            $table->foreign('car_detail_id')->references('id')->on('car_details');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_functions');
    }
};

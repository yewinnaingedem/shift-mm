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
            $table->text('engineAndSuspension')->nullable();
            $table->text('bodyAndPaint')->nullable();
            $table->text('TvAndWiring')->nullable();
            $table->text('addition_exception')->nullable();
            $table->boolean('checkedAtShowroom')->default(0)->nullable();
            $table->boolean('NMVTIS')->default(0)->nullable();
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

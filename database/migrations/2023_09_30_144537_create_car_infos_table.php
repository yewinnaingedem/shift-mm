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
        Schema::create('car_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('modal_name');
            $table->string('transmission');
            $table->string('divertrim');
            $table->string('engine');
            $table->timestamps();
            // Modals foreign Key ;
            $table->foreign('modal_name')->references('id')->on('modals');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_infos');
    }
};

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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('warranty');
            $table->unsignedBigInteger("steering_coner");
            $table->string('place_of_orgin');
            $table->string('number_seats');
            $table->string('kilo_meter');
            $table->unsignedBigInteger('grade');
            $table->string('interior_color');
            $table->string('break');
            $table->timestamps();

            $table->foreign('steering_coner')->references('id')->on('steerings');
            $table->foreign('grade')->references('id')->on('grades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};

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
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->string('seate_moter');
            $table->string('driver_seat_motor');
            $table->string('both_passanger');
            $table->string('third_rows');
            $table->string('seat_leather');
            $table->string('seat_normal');
            $table->string('seat_header');
            $table->string('both_header');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seats');
    }
};

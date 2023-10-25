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
        Schema::create('basics', function (Blueprint $table) {
            $table->id();
            $table->string('license_plate');
            $table->string('license_state');
            $table->string('exterior_color');
            $table->string('interior_color');
            $table->unsignedBigInteger('engine_id');
            $table->timestamps();

            $table->foreign('engine_id')->reference('id')->on('grades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basics');
    }
};

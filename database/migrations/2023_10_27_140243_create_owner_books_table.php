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
        Schema::create('owner_books', function (Blueprint $table) {
            $table->id();
            $table->string('vin');
            $table->string('color');
            $table->string('license_state');
            $table->string('license_plate');
            $table->string('pass_owner');
            $table->string('transmission');
            $table->string('engine_exception')->nullable();
            $table->string('license_exception')->nullable();
            $table->string('exception')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owner_books');
    }
};

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
        Schema::create('default_functions', function (Blueprint $table) {
            $table->id();
            $table->boolean('air_conditioning');
            $table->boolean('power_steering');
            $table->boolean('power_windows');
            $table->boolean('abs_brakes');
            $table->boolean('airbags');
            $table->boolean('navigation_system');
            $table->boolean('bluetooth_connectivity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('default_functions');
    }
};

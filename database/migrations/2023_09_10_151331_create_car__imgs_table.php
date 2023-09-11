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
        Schema::create('car__imgs', function (Blueprint $table) {
            $table->id();
            $table->string('font');
            $table->string('east');
            $table->string('side_1');
            $table->string('side_2');
            $table->string('interior');
            $table->string('kilo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car__imgs');
    }
};

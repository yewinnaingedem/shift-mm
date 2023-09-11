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
        Schema::create('aricons', function (Blueprint $table) {
            $table->id();
            $table->string('ditigal_aircon');
            $table->string('manual_aricon');
            $table->string('rounded_aricon');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aricons');
    }
};

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
            $table->unsignedBigInteger('modal_name');
            $table->string('license')->unique();
            $table->string('millage');
            $table->string('trim')->nullable();
            $table->string('exterior_color');
            $table->string('body_style');
            $table->timestamps();

            // Modal Name is foreign Key 
            $table->foreign('modal_name')->references('id')->on('modals');
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

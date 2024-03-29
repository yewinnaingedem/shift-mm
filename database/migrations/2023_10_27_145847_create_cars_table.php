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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('owner_book_id');
            $table->unsignedBigInteger('car_image_id');
            $table->unsignedBigInteger('exception_id')->nullable();
            $table->timestamps();

            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('owner_book_id')->references('id')->on('owner_books');
            $table->foreign('car_image_id')->references('id')->on('car_images');
            $table->foreign('exception_id')->references('id')->on('exceptions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};

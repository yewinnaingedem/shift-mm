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
            $table->unsignedBigInteger('modal_Id');
            $table->unsignedBigInteger('basic_Id');
            $table->unsignedBigInteger('fucture_Id');
            $table->unsignedBigInteger('car_info_Id');
            $table->timestamps();

            $table->foreign('modal_Id')->references('id')->on('modals');
            $table->foreign('basic_Id')->references('id')->on('basics');
            $table->foreign('fucture_Id')->references('id')->on('fuctures');
            $table->foreign('car_info_Id')->references('id')->on('car_infos');
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

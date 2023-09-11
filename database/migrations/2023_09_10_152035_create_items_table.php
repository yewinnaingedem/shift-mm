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
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('fecture_id');
            $table->unsignedBigInteger('img_Id');
            $table->string('item_name');
            $table->string('in_hand_qty');
            $table->string('purchase_price');
            $table->string('warranty');
            $table->string('creted_by')->nullable();
            $table->string('updated_by')->nullable();

            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('fecture_id')->references('id')->on('fectures');
            $table->foreign('img_Id')->references('id')->on('car__imgs');
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
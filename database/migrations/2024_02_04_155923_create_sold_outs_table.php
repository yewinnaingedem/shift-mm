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
        Schema::create('sold_outs', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('depositState');
            $table->unsignedBigInteger('automobile_sale_id');
            $table->unsignedBigInteger('buyer_id');
            
            $table->unsignedBigInteger('dealer_id');
            $table->unsignedBigInteger('hire_purchase_id');
            $table->unsignedBigInteger('broker_id')->nullable();
            $table->string('currentMonth');
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employee_details');
            $table->foreign('automobile_sale_id')->references('id')->on('automobile_sales');
            $table->foreign('buyer_id')->references('id')->on('buyers');
            $table->foreign('hire_purchase_id')->references('id')->on('hire_purchases');
            $table->foreign('broker_id')->references('id')->on('brokers');
            $table->foreign('depositState')->references('id')->on('deposits');
            $table->foreign('dealer_id')->references('id')->on('dealers');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sold_outs');
    }
};

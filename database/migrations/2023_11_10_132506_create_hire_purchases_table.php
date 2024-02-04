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
        Schema::create('hire_purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hp_plan_id');
            $table->string('finalPrice');
            $table->string('downpayment');
            $table->string('deposit')->nullable();
            $table->string('insurance');
            $table->string('bank_commission');
            $table->string('service_charge');
            $table->string('loan_month');
            $table->timestamps();

            $table->foreign('hp_plan_id')->references('id')->on('hp_plans');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hire_purchases');
    }
};

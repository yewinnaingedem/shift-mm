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
        Schema::create('employee_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id') ;
            $table->unsignedBigInteger('employment_status');
            $table->date('date_of_hire');
            $table->decimal('salary', 10, 2);
            $table->string('summary')->nullable();
            $table->string('note')->nullable();
            $table->unsignedBigInteger('position_id');
            $table->timestamps();

            $table->foreign('position_id')->references('id')->on('positions');
            $table->foreign('employment_status')->references('id')->on('employment_statuses');
            $table->foreign('employee_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_details');
    }
};

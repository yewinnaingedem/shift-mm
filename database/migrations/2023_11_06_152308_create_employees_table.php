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
        // Schema::create('employees', function (Blueprint $table) {
        //     // $table->id();
        //     // $table->string('name');
        //     // $table->string('email');
        //     // $table->string('phone');
        //     // $table->unsignedBigInteger('position');
        //     // $table->string('age');
        //     // $table->string('start_date');
        //     // $table->string('font-nrc');
        //     // $table->string('back-nrc');
        //     // $table->string('address');
        //     // $table->string('salary');
        //     // $table->timestamps();

            // $table->foreign('position')->references('id')->on('positions');
        // });
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('email')->unique();
            $table->boolean('married')->default(0);
            $table->string('phone_number');
            $table->string('emergency_contact_name')->nullable();
            $table->string('profile');
            $table->string('address') ;
            $table->string('font-nrc');
            $table->string('back-nrc');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};

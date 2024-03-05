<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;

class creatDynamicTables extends Controller
{
    public function createDynamicTables()
    {
        try {
            $mechinses = DB::table('machines')->pluck('name')->toArray();
            foreach ($mechinses as $mechinsesName) {
                $tableName = strtolower(str_replace(' ', '_', $mechinsesName));
                if (!Schema::hasTable($tableName)) {
                    Schema::create($tableName, function (Blueprint $table) {
                        $table->id();
                        $table->unsignedBigInteger('car_id');
                        $table->string('code_id');
                        $table->string('fxingPoint');
                        $table->string('about');
                        $table->boolean('pandingState')->default(0);
                        $table->foreign('car_id')->references('id')->on('cars');
                    });
                }
            }
            Artisan::call('migrate');
            return 'Dynamic tables created successfully' ;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Car\ModelController;
use App\Http\Controllers\Api\AddCarController ;
use App\Http\Controllers\GradeApiController ;
use App\Http\Controllers\HoverResponseController ;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); 
Route::post('sarchQuery' , [ModelController::class , 'searchQuery']);
Route::resource('end-point' , GradeApiController::class);
Route::get('default_function/{dataId}' , [GradeApiController::class , 'apiRoute']);
Route::get('{value}' , [HoverResponseController::class , 'index']);
Route::get('gradeTurbo/{id}' , [GradeApiController::class , 'turboLoad']);
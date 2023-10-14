<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AddCarController ;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); 
Route::prefix('admin')->group(function () {
    Route::post('setup' , [AddCarController::class , 'index']);
    Route::get('testing' , [AddCarController::class , 'setup']);    
});

    
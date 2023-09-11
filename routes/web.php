<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\POS\MMCarsController ;
use App\Http\Controllers\Register\AuthController ;
use App\Http\Controllers\Contant\DetailsController ;
use App\Http\Controllers\Financing\FinancingController;
use App\Http\Controllers\Admin\AdminAuthController;

Route::get('/google' , [AuthController::class , 'googleLogIn']);
Route::prefix('mm_cars')->group(function () {
    Route::get('/' , [MMCarsController::class , 'index']);
    Route::get('/log-in' , [AuthController::class , 'index']); 
    Route::post('log-in',[AuthController::class , 'logIn']);
    Route::get('/redirect/google', [AuthController::class , 'redirectGoogle']);
    Route::get('/profile/{id}' , [AuthController::class, "authProfile"]);
    Route::get("/log-out" , function () {
        Auth::logout() ;
        
        return redirect('mm_cars');
    });
    Route::get('/register',[AuthController::class , 'userRegister']);
    Route::post('/register',[AuthController::class , 'register']);
    Route::post('change_profile/{id}' , [AuthController::class , 'changeProfile']);

    // Car Details
    Route::get('{carname}/{id}' , [DetailsController::class , 'index'] );

    // financing 
    Route::get('financing' , [FinancingController::class , 'index'] );
});

Route::prefix('admin')->group(function (){
    Route::get('/' , [AdminAuthController::class , 'index']);

});

?> 
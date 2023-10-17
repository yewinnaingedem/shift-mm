<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\POS\MMCarsController ;
use App\Http\Controllers\Register\AuthController ;
use App\Http\Controllers\Contant\DetailsController ;
use App\Http\Controllers\Financing\FinancingController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\ImagesController;
use App\Http\Controllers\Cars\BrandController;
use App\Http\Controllers\Cars\FectureController;
use App\Http\Controllers\Car\ModelController;
use App\Http\Controllers\Car\CarModelController;
use App\Http\Controllers\Api\AddCarController ;


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
    // Vue Add
    Route::get('add-cars' , [AdminAuthController::class , 'addCars'] );
    Route::get('car-info' , [AdminAuthController::class , 'carInfo']);
    Route::post('add-cars' , [ModelController::class , 'index']);
    Route::get('{make}/{model}/{year}' , [ModelController::class , 'stepProgess']);
    Route::post('car-info/{id}' , [AdminAuthController::class , 'details']);
    Route::delete('car-info/{id}', [AdminAuthController::class , 'deleteCard']);
    Route::put('update-info/{id}' , [AdminAuthController::class , 'updateInfo']);
    Route::post('setup' , [AddCarController::class , 'index']);

    Route::resource('car_models' , CarModelController::class) ;
});

?> 
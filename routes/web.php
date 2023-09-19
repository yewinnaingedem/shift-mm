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
    // // Car img
    // Route::resource('imgs' , ImagesController::class );
    // // Brands
    // Route::resource('brands' , BrandController::class );
    // // Fecuter 
    // Route::resource('fecuters' , FectureController::class );

    // Vue Add
    Route::get('add-cars' , [AdminAuthController::class , 'addCars'] );

    Route::post('add-cars' , [ModelController::class , 'index']);
    Route::get('step-progess' , [ModelController::class , 'stepProgess']);
    Route::get('cars-test/{model_year}/{make}/{modal}' , [ModelController::class , 'routeTest']);
});

?> 
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\POS\MMCarsController ;
use App\Http\Controllers\Register\AuthController ;
use App\Http\Controllers\Contant\DetailsController ;
use App\Http\Controllers\Financing\FinancingController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\ImagesController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\SaledController;
use App\Http\Controllers\Cars\BrandController;
use App\Http\Controllers\Cars\FectureController;
use App\Http\Controllers\Car\ModelController;
use App\Http\Controllers\Car\CarModelController;
use App\Http\Controllers\Api\AddCarController ;
use App\Http\Controllers\Car\GradeController ;
use App\Http\Controllers\Car\FunctionController ;
use App\Http\Controllers\Search\SearchController ;
use App\Http\Controllers\Condition\SeatController ;
use App\Http\Controllers\Condition\KeyController ;
use App\Http\Controllers\Condition\SunRoofController ;
use App\Http\Controllers\Condition\SonarController ;
use App\Http\Controllers\Condition\CameraController ;
use App\Http\Controllers\Engine\EngineController ;
use App\Http\Controllers\Car\CarItemController ;
use App\Http\Controllers\Car\CarsellController ;
use App\Http\Controllers\Car\CarImageItemController ;
use App\Http\Controllers\Car\SoldOutController ;
use App\Http\Controllers\Car\DefaultFunctionController;
use App\Http\Controllers\Car\licenseStateController;
use App\Http\Controllers\BeforeSaleController ;




Route::get('/google' , [AuthController::class , 'googleLogIn']);
Route::prefix('mm_cars')->group(function () {
    Route::get('/' , [MMCarsController::class , 'index']);
    Route::get('shop_mm' , [MMCarsController::class , 'shopMM']);
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
    Route::get('car/{details}' , [DetailsController::class , 'index'] );
    // financing 
    Route::get('financing' , [FinancingController::class , 'index']);
    
});

Route::prefix('admin')->group(function (){
    Route::get('/' , [AdminAuthController::class , 'index']);
    Route::get('add-cars' , [AdminAuthController::class , 'addCars'] );
    Route::get('car-info' , [AdminAuthController::class , 'carInfo']);
    Route::post('add-cars' , [ModelController::class , 'index']);
    Route::get('car/{make}/{model}/{year}' , [ModelController::class , 'stepProgess']);
    Route::post('car-info/{id}' , [AdminAuthController::class , 'details']);
    Route::delete('car-info/{id}', [AdminAuthController::class , 'deleteCard']);
    Route::put('update-info/{id}' , [AdminAuthController::class , 'updateInfo']);
    Route::post('setup' , [AddCarController::class , 'index']);
    Route::resource('car_img' , CarImageItemController::class );
    Route::resource('car_models' , CarModelController::class) ;
    Route::resource('grade'  , GradeController::class);
    Route::post('grade/function' , [GradeController::class , 'gradeFunction']);
    Route::resource('function' , FunctionController::class );
    Route::post('model/{id}' , [CarModelController::class , 'modelSearch']);
    Route::post('function/create' , [GradeController::class , 'gradeFunction']);
    Route::post('function/testing' , [GradeController::class , 'functionTesting']);
    Route::resource('seat' , SeatController::class) ;
    Route::resource('key' , KeyController::class);
    Route::resource('sun_roof' , SunRoofController::class);
    Route::resource('sonar' , SonarController::class);
    Route::resource('camera' , CameraController::class);
    Route::resource('engine' , EngineController::class );
    Route::resource('before_sale' , BeforeSaleController::class );
    Route::resource('cars' ,  CarItemController::class );
    Route::resource('car_sells', CarsellController::class);
    Route::resource('sold_out' , SoldOutController::class) ;
    Route::resource('employees', EmployeeController::class);
    Route::resource('brand' , BrandController::class );
    Route::resource('positions' , PositionController::class);
    Route::resource('saled' , SaledController::class);
    Route::resource('default-function' , DefaultFunctionController::class );
    Route::resource('license-state' , licenseStateController::class);
    Route::get('search/{query}', [SearchController::class , 'search'] );
    Route::get('routeBack' , function () {
        return redirect()->back() ;
    });
});

?> 
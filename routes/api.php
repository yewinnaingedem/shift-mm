<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Car\ModelController;
use App\Http\Controllers\Api\AddCarController ;
use App\Http\Controllers\GradeApiController ;
use App\Http\Controllers\HoverResponseController ;
use App\Http\Controllers\paintDemageController ;
use App\Http\Controllers\TVController ;
use App\Http\Controllers\SuspensionDemageController ;
use App\Http\Controllers\pendingStateController ;
use App\Http\Controllers\EngineDemageController ;
use App\Http\Controllers\LightsDemageController ;
use App\Http\Controllers\ChartController ;
use App\Http\Controllers\AdditionalDemageController ;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); 
Route::post('sarchQuery' , [ModelController::class , 'searchQuery']);
Route::get('moveToNextStep/{carId}' , [pendingStateController::class , 'moveToNextStep']);
Route::post('pendingState' , [pendingStateController::class , 'fixedPanding']);
Route::resource('end-point' , GradeApiController::class);
Route::get('default_function/{dataId}' , [GradeApiController::class , 'apiRoute']);
Route::get('{value}' , [HoverResponseController::class , 'index']);
Route::get('gradeTurbo/{id}' , [GradeApiController::class , 'turboLoad']);
// For pintAndBody 
Route::apiResource('paintDemage' , paintDemageController::class );
Route::put('bodyAndPaint/{parameter}' , [paintDemageController::class , 'putDemage']);
Route::post('bodyAndPaint/codeApi' , [paintDemageController::class , 'checkApi']);
// for Demage 
Route::apiResource('tvDemage' , TVController::class);
Route::post('tv/codeApi' , [TVController::class , 'checkApi']);
// For Engine 
Route::apiResource('engineDemage' , EngineDemageController::class);
Route::post('engineDemage/codeApi' , [EngineDemageController::class , 'checkApi']);
// For Suspension 
Route::apiResource('suspensionDemage' , SuspensionDemageController::class);
Route::post('suspensionDemage/codeApi' , [SuspensionDemageController::class , 'checkApi']);
// For Lights 
Route::apiResource('lightsDemage' , LightsDemageController::class);
Route::post('lightsDemage/codeApi' , [LightsDemageController::class , 'checkApi']);
// for AdditionalDemage
Route::apiResource('additionalDemage' , AdditionalDemageController::class);
Route::post('additionalDemage/codeApi' , [AdditionalDemageController::class , 'checkApi']);
Route::post('pendingStateCheck' , [pendingStateController::class , 'pandingState']);
Route::get('Google/coreChart' , [ChartController::class , 'coreChart'] );
Route::get('Google/checkMonthly' , [ChartController::class , 'monthlyChart']);
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
use App\Http\Controllers\demageReportState ;
use App\Http\Controllers\AdditionalDemageController ;
use App\Http\Controllers\UiSearchableController ;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); 
Route::post('sarchQuery' , [ModelController::class , 'searchQuery']);
Route::get('moveToNextStep/{carId}' , [pendingStateController::class , 'moveToNextStep']);
Route::post('pendingState' , [pendingStateController::class , 'fixedPanding']);
Route::resource('end-point' , GradeApiController::class);
Route::get('default_function/{dataId}' , [GradeApiController::class , 'apiRoute']);
Route::get('{value}' , [HoverResponseController::class , 'index']);
Route::get('hover/{value}' , [HoverResponseController::class , 'hoverText']);
Route::get('gradeTurbo/{id}' , [GradeApiController::class , 'turboLoad']);
Route::apiResource('additionalDemage' , AdditionalDemageController::class);
Route::post('additionalDemage/codeApi' , [AdditionalDemageController::class , 'checkApi']);
Route::post('pendingStateCheck' , [pendingStateController::class , 'pandingState']);
Route::get('Google/coreChart' , [ChartController::class , 'coreChart'] );
Route::get('Google/checkMonthly' , [ChartController::class , 'monthlyChart']);

// Demage Report 
Route::post('demageReport/{id}' , [demageReportState::class , 'report']);
Route::post('stateChange' , [demageReportState::class , 'stateChange']);
Route::post('moveNext' , [demageReportState::class , 'MoveNext']);
Route::post('uiserach/{id}' , [UiSearchableController::class , 'apisearch']);
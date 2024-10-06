<?php

use App\Http\Controllers\FeeController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/getStudentresults/{student}', [StudentController::class, 'getStudentresults'])->middleware('auth:sanctum');
Route::get('/getFeesPercent/', [FeeController::class, 'index'])->middleware('auth:sanctum');

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MortalController;
use App\Http\Controllers\API\PotongController;
use App\Http\Controllers\API\SuplierController;
use App\Http\Controllers\API\PopulasiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::apiResource('populasi', PopulasiController::class);
Route::apiResource('suplier', SuplierController::class);
Route::apiResource('mortal', MortalController::class);
Route::apiResource('potong', PotongController::class);

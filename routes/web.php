<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MortalController;
use App\Http\Controllers\PotongController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\PopulasiController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('supliers', SuplierController::class);
Route::resource('populasis', PopulasiController::class);
Route::resource('mortals', MortalController::class);
Route::resource('potongs', PotongController::class);

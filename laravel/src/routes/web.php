<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ColorController;
use Illuminate\Support\Facades\Route;

Route::resource('colors', ColorController::class);
Route::resource('cars', CarController::class);

Route::get('/', function () {
    return view('welcome');
});

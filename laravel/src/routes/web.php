<?php

use App\Http\Controllers\CarColorController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\VariableController;
use Illuminate\Support\Facades\Route;

Route::resource('colors', ColorController::class);
Route::resource('cars', CarController::class);
Route::resource('car_colors', CarColorController::class);

Route::get('variable', VariableController::class);

Route::get('/', function () {
    return view('welcome');
});

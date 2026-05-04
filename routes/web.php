<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\ReportController::class, 'index']);
Route::view('/profile','pages.profile');
Route::view('/registration','pages.registration');
Route::view('/abstract','abstract');

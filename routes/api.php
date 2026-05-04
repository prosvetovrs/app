<?php

use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\ExpenseCategoryGroupController::class)->group(function () {
    Route::post('create-expense-category-group', 'create');
});

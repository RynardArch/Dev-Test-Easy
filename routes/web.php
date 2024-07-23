<?php

use App\Http\Controllers\CarController;

Route::get('/', function () {
    return redirect('/cars');
});

Route::resource('cars', CarController::class);

<?php

use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

Route::controller(GuestController::class)->group(function () {
    Route::get('guest', 'index');
    Route::post('guest', 'store');
    Route::get('guest/{id}', 'index')->whereNumber('id');
    Route::patch('guest/{id}', 'update')->whereNumber('id');
    Route::delete('guest/{id}', 'destroy')->whereNumber('id');
});

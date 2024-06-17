<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NarratorController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('narrator', function () {
    return view('narrator');
});
Route::post('narrator', [NarratorController::class, 'narrate'])->name('narrate');

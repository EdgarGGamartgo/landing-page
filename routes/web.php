<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

Route::get('/', [LandingController::class, 'show'])->name('landing.show');
Route::post('/', [LandingController::class, 'store'])->name('landing.store');


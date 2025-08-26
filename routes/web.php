<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PasienController;

Route::resource('pasien', PasienController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

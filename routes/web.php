<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PasienController;
use Illuminate\Auth\Middleware\Authenticate;

Route::middleware([Authenticate::class])->group(function(){
    Route::resource('pasien', PasienController::class);
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

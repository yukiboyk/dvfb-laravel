<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\Clients\AuthController;
use App\Http\Controllers\Clients\HomeController;

Route::middleware(['XSS'])->prefix('Auth')->group(function () {
    Route::get('/login',[AuthController::class,'showFormLogin'])->name('showFormLogin');
    Route::get('/register',[AuthController::class,'showFormRegister'])->name('showFormRegister');

    Route::post('/register', [AuthController::class,'rqRegister'])->name('rqRegister');
});

Route::middleware(['XSS', 'auth'])->prefix('system')->group(function () {
    Route::post('/logout',[LogoutController::class,'logout'])->name('logout');
    Route::get('/home',[HomeController::class,'homeDashboard'])->name('homeDashboard');

});


?>
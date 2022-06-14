<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\Clients\AuthController;
use App\Http\Controllers\Clients\HomeController;

Route::middleware(['XSS'])->prefix('Auth')->group(function () {
    Route::get('/login',[AuthController::class,'showFormLogin'])->name('showFormLogin');
    Route::get('/register',[AuthController::class,'showFormRegister'])->name('showFormRegister');
    Route::post('/register', [AuthController::class,'rqRegister'])->name('rqRegister');
    Route::post('/login',[AuthController::class,'rqLogin'])->name('rqLogin');
    Route::get('/forgot-password',[AuthController::class,'showFormForgotPass'])->name('showFormForgotPass');
    Route::post('/forgot-password',[AuthController::class,'rqForgotPass'])->name('rqForgotPass');
    Route::get('/reset-password/{token}',[AuthController::class,'showFormResetPass'])->name('showFormResetPass');
    Route::post('/reset-password',[AuthController::class,'rqResetPass'])->name('rqResetPass');
});

Route::middleware(['XSS', 'checkUser.auth'])->prefix('system')->group(function () {
    Route::post('/logout',[LogoutController::class,'logout'])->name('logout');
    Route::get('/home',[HomeController::class,'homeDashboard'])->name('homeDashboard');

});


?>
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Clients\AuthController;
use App\Http\Controllers\Clients\HomeController;
use App\Http\Controllers\Clients\TwoFaceAuthController;

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

Route::middleware(['checkUser.auth','2fa'])->prefix('system')->group(function () {
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
    Route::get('/home',[HomeController::class,'homeDashboard'])->name('homeDashboard');
    Route::get('/two-face-authentication',[TwoFaceAuthController::class,'showSetting2FA'])->name('showSetting2FA');
    Route::post('/two-face-authentication',[TwoFaceAuthController::class,'enable2FA'])->name('enable2FA');
    Route::get('/profile',[HomeController::class,'viewProfile'])->name('viewProfile');
    Route::post('/change-password',[AuthController::class,'changePassword'])->name('changePassword');

});


?>
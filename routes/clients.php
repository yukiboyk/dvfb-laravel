<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Clients\AuthController;


Route::get('/login',[AuthController::class,'indexLogin']);
Route::get('/home',[AuthController::class,'home']);
Route::get('/register',[AuthController::class,'indexReg']);
Route::post('/register',[AuthController::class,'submitReg'])->name('submitReg');



?>
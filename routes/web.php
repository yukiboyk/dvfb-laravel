<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Clients\HomeController;


// Route::get('/', function () {
//    return view('hello');
// });
Route::get('/',[TestController::class,'test'])->name('test');
Route::post('/',[TestController::class,'addtest'])->name('addtest');
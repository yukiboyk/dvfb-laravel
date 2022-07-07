<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Clients\HomeController;


Route::get('/', function () {
   return view('hello');
});
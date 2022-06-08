<?php

namespace App\Http\Controllers\Clients;

use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->caidat = New Settings();
        $this->caidat = $this->caidat->first();
    }
    public function indexLogin()
    {
        $title = $this->caidat->name_web;
        return view('clients.auth.login',compact('title'));
    }
    public function home() 
    {
        $title = $this->caidat->name_web;
        return view('clients.Home',compact('title'));
    }
    public function indexReg()
    {
        return view('clients.auth.register');
    }  

    public function submitReg(Request $request)
    {
        dd($request->all());
    }
}

<?php

namespace App\Http\Controllers\Clients;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;

////xử lí việc register and login
class AuthController extends Controller
{ 

    public function showFormRegister()
    {
        return view('clients.auth.register');
    }
    
    public function rqRegister(RegisterRequest $request)
    {
        // dd($request->all());
        $data = $request->all();
        $createUser = User::create($data);
        if ($createUser) {
            auth()->login($createUser);
            return redirect()->route('homeDashboard');
        }
         return redirect()->back();
    }

    public function showFormLogin()
    {
        return view('clients.auth.login');
    }
   
}

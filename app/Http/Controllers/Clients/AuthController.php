<?php

namespace App\Http\Controllers\Clients;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        // dd($request->validated());
        $data = $request->validated();
        $createUser = User::create($data);
        if ($createUser) {
            auth()->login($createUser);
            return redirect()->route('homeDashboard');
        }
         return redirect()->back()->with('message','Lỗi Máy Chủ,Đăng Kí Thất Bại');
    }

    public function showFormLogin()
    {
        return view('clients.auth.login');
    }

    public function rqLogin(LoginRequest $request)
    {
        $request->flash();

    try {
        $remember = $request->has('remember_me') ? true : false;
        $check = Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ],$remember);
        if (!$check) {
           return redirect()->back()->with('message','Tài Khoản Hoặc Mật khẩu không chính xác');
        }
        return redirect()->route('homeDashboard');
         
        }catch (Exception $e) {
            return redirect()->back()->with('message',$e->getMessage());
        }
        
    }
   
}

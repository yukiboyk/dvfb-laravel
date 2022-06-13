<?php

namespace App\Http\Controllers\Clients;

use App\Models\User;
use App\Models\Telegram;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Notifications\SendTelegram;
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
        $createUser->notify(new SendTelegram($request->username));
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
        $remember = $request->has('remember_me') ? true : false;
        $check = Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ],$remember);
        if (!$check) {
           return redirect()->back()->with('message','Tài Khoản Hoặc Mật khẩu không chính xác');
        }
        return redirect()->route('homeDashboard');
        
    }

    public function showFormResetPass()
    {
        return view('clients.auth.reset-password');
    }

    public function rqResetPass(Request $request)
    {
       $validate = $request->validate([
               'email' => 'required|email:filter|exists:users,email'
       ],[
                'exists'=>'Khong ton tai email nay trong CSDL'
       ]);
    }
   
}

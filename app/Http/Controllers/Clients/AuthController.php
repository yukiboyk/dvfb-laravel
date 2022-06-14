<?php

namespace App\Http\Controllers\Clients;

use App\Models\User;
use App\Models\Telegram;
use App\Mail\ResetPassword;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use Illuminate\Support\Carbon;
use App\Http\Requests\LoginRequest;
use App\Notifications\SendTelegram;
use App\Http\Requests\ResetPass;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ForgotPassword;
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
         return redirect()->back()->with('error','Lỗi Máy Chủ,Đăng Kí Thất Bại');
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
           return redirect()->back()->with('error','Tài Khoản Hoặc Mật khẩu không chính xác');
        }
        return redirect()->route('homeDashboard');
        
    }

    public function showFormForgotPass()
    {
        return view('clients.auth.forgot-password');
    }

    public function rqForgotPass(ForgotPassword $request)
    {
       $passwordReset = PasswordReset::updateOrCreate([
           'email' => $request->email,
       ],[
           'token' => Str::random(120),
       ]);
    if ($passwordReset) {
       Mail::to($request->email)->send(new ResetPassword($passwordReset->token));
       return redirect()->back()->with('success','Chúng tôi đã gửi link verify tới email '.$request->email.' vui lòng kiểm tra email và làm theo hướng dẫn');
    }
    }
     
    public function showFormResetPass($token)
    {   
        $passwordReset = PasswordReset::where('token', $token)->firstOrFail();
        return view('clients.auth.reset-password',compact('token'));   
    }
   
    public function rqResetPass(ResetPass $request)
    {
        $checkToken = PasswordReset::where('token', $request->token)->firstOrFail();
        if (Carbon::parse($checkToken->created_at)->addMinutes(15)->isPast()) {
            $checkToken->delete();
            return redirect()->route('showFormForgotPass')->with('error','Mã Xác thực đặt lại mật khẩu đã hết hạn vui lòng xác minh lại');
        }
        $user = User::where('email', $checkToken->email)->firstOrFail();
        $updatePasswordUser = $user->update($request->only('password'));
        $checkToken->delete();

        return redirect()->route('showFormLogin')->with('success','Mật Khẩu đã được thay đổi bạn có thể đăng nhập');
    }

}

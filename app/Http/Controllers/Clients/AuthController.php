<?php

namespace App\Http\Controllers\Clients;

use Carbon\Carbon;
use App\Models\Logs;
use App\Models\User;
use App\Models\Telegram;
use App\Mail\ResetPassword;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use App\Http\Requests\ResetPass;
use App\Http\Requests\LoginRequest;
use App\Notifications\SendTelegram;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ForgotPassword;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Validator;
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
        // $createUser->notify(new SendTelegram($request->username));
        if ($createUser) {
            logsCreate('Đăng kí tài khoản thành công',$request->ip(), $request->header('User-Agent'));
            
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
        logsCreate('Đăng nhập vào website thành công',$request->ip(), $request->header('User-Agent'));
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
       return redirect()->back()->with('success','Chúng tôi đã gửi link đặt lại mật khẩu tới email '.$request->email.' vui lòng kiểm tra email và làm theo hướng dẫn');
    }
    }
     
    public function showFormResetPass($token)
    {   
        ///kiểm tra xem token này có tồn tại ko?
        $checkVerifyToken = PasswordReset::where('token', $token)->firstOrFail();
        return view('clients.auth.reset-password',compact('token'));   
    }
   
    public function rqResetPass(ResetPass $request)
    {
        $checkToken = PasswordReset::where('token', $request->token)->firstOrFail();
        if (Carbon::parse($checkToken->created_at)->addMinutes(15)->isPast()) 
        { 
            ///tính từ thời điểm tạo ra token +15p. nếu quá delete
            $checkToken->delete();
            return redirect()->route('showFormForgotPass')->with('error','Mã Xác thực đặt lại mật khẩu đã hết hạn vui lòng xác minh lại');
        }
        $user = User::where('email', $checkToken->email)->firstOrFail();
        $updatePasswordUser = $user->update($request->only('password'));
        $checkToken->delete();
        return redirect()->route('showFormLogin')->with('success','Mật Khẩu đã được thay đổi bạn có thể đăng nhập');
    }
    
    public function changePassword(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(),[
            'oldpassword'=>[
                'required', function($attribute, $value, $fail){
                    if(!Hash::check($value, Auth::user()->password) ){
                        return $fail('Mật khẩu cũ không khớp với dữ liệu');
                    }
                },
                'min:3',
                'max:30'
             ],
             'newpassword'=>'required|min:3|max:30',
             'cnewpassword'=>'required|same:newpassword'
            ],[
                'oldpassword.required'=>'Vui Lòng nhập mật khẩu cũ',
                'oldpassword.min'=>'Mật khẩu không được ít hơn :min kí tự',
                'oldpassword.max'=>'Mật khẩu không được nhiều hơn :min kí tự',
                'newpassword.required'=>'Vui lòng nhập mật khẩu mới',
                'newpassword.min'=>'Mật khẩu không được ít hơn :min kí tự',
                'newpassword.max'=>'Mật khẩu không được nhiều hơn :min kí tự',
                'cnewpassword.required'=>'Vui lòng nhập lại mật khẩu mới',
                'cnewpassword.same'=>'Xác minh lại mật khẩu không khớp'
         ]);
         if(!$validator->passes() ){
            return response()->json(['status'=> 'fails','message'=>$validator->errors()->toArray()]);
         }
         $update = User::find(Auth::user()->id)->update(['password'=>$request->newpassword]);

            if( !$update ){
                return response()->json(['status'=> 'fails','message'=>'Something went wrong, Failed to update password in db']);
            }else{
                logsCreate('Thực hiện thay đổi mật khẩu thành công',$request->ip(), $request->header('User-Agent'));
                return response()->json(['status'=>'success','message'=>'Thay đổi mật khẩu thành công, mật khẩu mới của bạn là <b>'.$request->newpassword.'</b>']);
            }      
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        \Session::flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('Auth/login');
    }

}

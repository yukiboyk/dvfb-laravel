<?php

namespace App\Http\Controllers\Clients;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TwoFaceAuthController extends Controller
{
    
    public function showSetting2FA()
    {
        $googleAuthenticator = new \PHPGangsta_GoogleAuthenticator();
        $secretCode = $googleAuthenticator->createSecret();
        $qrCodeUrl = $googleAuthenticator->getQRCodeGoogleUrl(
        Auth::user()->username, $secretCode, env('APP_URL')
    );
          return view('clients.auth.two-face-auth',compact('qrCodeUrl','secretCode'));
    }
    
    public function enable2FA(Request $request)
    {
        $validate = $request->validate([
             'code' => 'required|digits:6|min:6|max:6',
             'secretcode' => 'required'
        ]);
    
    // Khởi tạo Google Authenticator class
    $googleAuthenticator = new \PHPGangsta_GoogleAuthenticator();
    // Mã người dùng nhập không khớp với mã được sinh ra bởi ứng dụng
    if (!$googleAuthenticator->verifyCode($request->secretcode, $request->code, 0)) {
        return redirect()->back()->with("error", "Invalid code");
    }

    $user = Auth::user();
    $user->secret_code = $request->secretcode;
    $user->option_2fa = true;
    $user->save();
    
    return redirect()->back()->with("success", "Đã bật xác minh 2 bước");
    }
}

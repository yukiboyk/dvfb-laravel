<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Google2FA
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $secretCode = Auth::user()->secret_code;
        $option2fa = Auth::user()->option_2fa;
        // Kiểm tra, nếu có secret_code và chưa có session 2fa_verified
        // Thực hiện redirect tới màn hình nhập Authentication code
        if ($secretCode != null || $option2fa == true) {
            return redirect()->route("showFormLogin")->with('error','Bao mat 2fa');
        }
        return $next($request);
    }
}

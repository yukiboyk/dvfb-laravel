<?php

namespace App\Http\Controllers\Clients;

use App\Models\Logs;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function homeDashboard() 
    {   
        $fullname = Auth::user()->fullname;
        $balance = Auth::user()->balance;
        $total_recharge = Auth::user()->total_recharge;
        $role = Auth::user()->nameRole;
        return view('clients.Home',compact('fullname','balance','role','total_recharge'));
    }

    public function viewProfile()
    {
        $checkLogs = Logs::where('username',Auth::user()->username)
        ->orderBy('id', 'DESC')
        ->get();
        
        return view('clients.Profile',compact('checkLogs'));
    }

    public function upgradeLevel()
    {
        return view('clients.Up-level');
    }

}

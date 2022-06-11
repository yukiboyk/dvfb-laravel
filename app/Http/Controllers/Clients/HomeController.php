<?php

namespace App\Http\Controllers\Clients;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

}

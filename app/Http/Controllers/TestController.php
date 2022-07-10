<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index() {
        $users = User::all();

        return view('hello', compact('users'));
    }
    public function changeStatus(Request $request) {
        $user = User::find($request->user_id);
        $user->ban = $request->ban;
        $user->save();
        return response()->json(['success' => 'Status Changed Successfully']);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{

    public function index(){
        return view('auth.admin.login');
    }

    public function registerForm(){
        return view('auth.admin.register');
    }

    public function login(Request $request){
        // dd($request);
        $check = $request->all();
        if(Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password'] ])){
            return redirect()->route('admin.index')->with('error', 'Admin login success..');
        }else{
            return back()->with('error', 'Invalid email or password..');
        }
    }
}

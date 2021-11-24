<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{   //login.blade.php page view
    public function index(){
        return view('auth.login');
    }

    //login data submit
    public function login(Request $request){
     
     $creds=$request->except('_token');
     if(\auth()->attempt($creds)){
        if(\auth()->user()->role =='admin'){
            return redirect()->route('dashboard');
        }

        return redirect()->route('home');
     }
        return redirect()->back();
    }

    //logout
    public function logout(){
        \auth()->logout();
        return redirect()->route('login');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function login(Request $request){
        if(env('EMAIL') == $request->email && env('PASSWORD') == $request->password){
            session(['islogin' => true]);
            return redirect('/admin/destination')->with('success', 'Login Berhasil');
        }else{
            return redirect('/admin/login')->with('failed', 'Login Gagal');
        }
    }
}

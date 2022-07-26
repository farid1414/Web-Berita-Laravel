<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller

{
    public function login()
    {
        return view('login');
    }
    public function registrasi()
    {
        return view('registrasi');
    }

    public function postRegis(Request $request){
        $user = new \App\Models\User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(60);
        $user->save();

        return redirect()->route('login')->with('success', 'Berhasil Registrasi');
    }

    public function postLogin(Request $request){
        $credential = $request->only('email','password');

            if (Auth::attempt($credential)) {
                return redirect()->route('home');
            }
            Session::flash('gagal','Email atau kata sandi anda salah');
            return redirect()->back();
    }
    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return Redirect('/');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
class LoginController extends Controller
{
    public function login(){
        return view('Logins.Login');
    }

    public function postLogin(Request $request)
    {
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/home');
        }
        return redirect('/login')->with('status', 'Email atau Password Salah');;
    }

    public function register(){
        return view('Logins.Register');
    }

    public function simpanRegistrasi(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required'
    ],
    [
        'name.required' => 'Username tidak boleh kosong',
        'email.required' => 'Email tidak boleh kosong',
        'password.required' => 'Password tidak boleh kosong'
    ]);
        User::create([
            'name' => $request->name,
            'level' => 'dosen',
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60)
        ]);
        return redirect('login')->with('status', 'Register success');;
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}

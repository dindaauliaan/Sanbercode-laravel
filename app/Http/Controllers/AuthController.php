<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function showRegister(){
        return view('auth.register');
    }
    public function registerUser(Request $request){
        $request->validate([
            'name'=>'required|min:5',
            'email'=>'required|email',
            'password'=>'required|confirmed|min:8'
        ]);
        $userCount = User::count();
        $user = new user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = $userCount === 0 ? 'admin' : 'user';
        $user->save();
        return redirect('/')->with('success', 'register berhasil');
    }
    public function showLogin(){
        return view('auth.login');
    }
    public function loginUser(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', 'login berhasil');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'logout berhasil');
    }
}

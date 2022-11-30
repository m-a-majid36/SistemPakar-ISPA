<?php

namespace App\Http\Controllers;

use App\Models\Frontend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $data = Frontend::whereId(1)->first();
        if ($user = Auth::user()) {
            if ($user->role == "admin" || $user->role == "dokter") {
                return redirect()->intended('/dashboard');
            } else {
                return redirect()->intended('/');
            }
        }

        return view('auth.login', compact('data'));
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'login'    => 'required',
            'password' => 'required',
        ]);

        $email      = Auth::attempt(['email' => request('login'), 'password' => request('password')]);
        $username   = Auth::attempt(['username' => request('login'),'password' => request('password')]);
    
        if ($email || $username) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('error', 'Login gagal!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

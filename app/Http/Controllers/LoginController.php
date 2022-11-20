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
        $this->validate($request, [
            'login'    => 'required',
            'password' => 'required',
        ]);
    
        $login_type = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL ) 
            ? 'email' 
            : 'username';
    
        $request->merge([
            $login_type => $request->input('login')
        ]);
    
        if (Auth::attempt($request->only($login_type, 'password'))) {
            return redirect()->intended('/dashboard');
        }
    
        return redirect()->back()
            ->withInput()
            ->withErrors([
                'error' => 'Login Gagal.',
            ]);         
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

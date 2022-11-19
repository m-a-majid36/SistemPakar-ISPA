<?php

namespace App\Http\Controllers;

use App\Models\Frontend;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        $data = Frontend::whereId(1)->first();

        return view('auth.login', compact('data'));
    }
}

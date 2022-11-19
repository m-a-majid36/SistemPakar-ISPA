<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('frontend.home');
    }

    public function consult()
    {
        return view('frontend.consult');
    }

    public function info()
    {
        return view('frontend.info');
    }
}

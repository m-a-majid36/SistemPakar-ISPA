<?php

namespace App\Http\Controllers;

use App\Models\Frontend;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $data = Frontend::whereId(1)->first();

        return view('frontend.home', compact('data'));
    }

    public function consult()
    {
        $data = Frontend::whereId(1)->first();

        return view('frontend.consult', compact('data'));
    }

    public function info()
    {
        $data = Frontend::whereId(1)->first();

        return view('frontend.info', compact('data'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Frontend;
use App\Models\Symptom;
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
        $symptoms = Symptom::all();

        return view('frontend.info', compact('data', 'symptoms'));
    }
}

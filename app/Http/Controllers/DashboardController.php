<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\History;
use App\Models\Message;
use App\Models\Symptom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'admin' || Auth::user()->role == 'dokter') {
            return view('backend.dashboard', [
                "total_akun"    => User::count(),
                "total_pesan"   => Message::count(),
                "total_gejala"  => Symptom::count(),
                "total_penyakit"=> Disease::count(),
                "total_riwayat"  => History::count(),
            ]);
        } else {
            return redirect('/');
        }
    }

    public function profile()
    {
        return view('backend.profile');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function profile_update(Request $request, $id)
    {
        $validatedData = $request->validate([
            
        ]);
    }

    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Frontend;
use App\Models\Province;
use App\Models\Regency;
use App\Models\User;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        $data       = Frontend::whereId(1)->first();
        $provinces  = Province::all();

        return view('auth.register', compact('data', 'provinces'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'              => 'required',
            'username'          => 'required|unique:users',
            'phone'             => 'required|unique:users|min:9|max:20',
            'gender'            => 'required',
            'address'           => 'required',
            'province'          => 'required',
            'regency'           => 'required',
            'district'          => 'required',
            'village'           => 'required',
            'email'             => 'required|email:dns|unique:users',
            'password'          => 'required|min:8|max:255',
            'password-confirm'  => 'required|same:password',
        ]);

        $validatedData['role']      = 'pasien';
        $validatedData['password']  = Hash::make($validatedData['password']);

        $hasil = User::create($validatedData);
        if ($hasil) {
            return redirect()->route('login')->with('success', 'Registrasi berhasil, silahkan login');
        }
        return redirect()->route('register')->with('error', 'Registrasi gagal, silahkan daftar lagi!');
    }

    public function get_regencies(Request $request)
    {
        $id_province = $request->id_province;

        $regencies = Regency::where('province_id', $id_province)->get();

        $option = "<option selected disabled>Pilih Kota/Kabupaten...</option>";
        foreach($regencies as $regency){
            $option .= "<option value='$regency->id'>$regency->name</option>";
        }

        echo $option;
    }

    public function get_districts(Request $request)
    {
        $id_regency = $request->id_regency;

        $districts = District::where('regency_id', $id_regency)->get();

        $option = "<option selected disabled>Pilih Kecamatan...</option>";
        foreach($districts as $district){
            $option .= "<option value='$district->id'>$district->name</option>";
        }

        echo $option;
    }
    
    public function get_villages(Request $request)
    {
        $id_district = $request->id_district;

        $villages = Village::where('district_id', $id_district)->get();

        $option = "<option selected disabled>Pilih Kelurahan/Desa...</option>";
        foreach($villages as $village){
            $option .= "<option value='$village->id'>$village->name</option>";
        }

        echo $option;
    }
}

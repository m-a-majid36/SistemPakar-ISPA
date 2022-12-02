<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Disease;
use App\Models\History;
use App\Models\Message;
use App\Models\Regency;
use App\Models\Symptom;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
                "total_riwayat" => History::count(),
            ]);
        } else {
            return redirect('/');
        }
    }

    public function profile()
    {
        $user = Auth::user();

        return view('backend.profile', [
            "user"      => $user,
            "provinces" => Province::all(),
            "regencies" => Regency::where('province_id', $user->regency->province_id)->get(),
            "districts" => District::where('regency_id', $user->district->regency_id)->get(),
            "villages"  => Village::where('district_id', $user->village->district_id)->get()
        ]);
    }

    public function profile_update(Request $request)
    {
        $validatedData = $request->validate([
            'name'              => 'required',
            'username'          => 'required|unique:users,username,' . Auth::user()->id,
            'phone'             => 'required|min:9|max:20|unique:users,phone,' . Auth::user()->id,
            'gender'            => 'required',
            'address'           => 'required',
            'province_id'       => 'required',
            'regency_id'        => 'required',
            'district_id'       => 'required',
            'village_id'        => 'required',
            'email'             => 'required|email:dns|unique:users,email,' . Auth::user()->id,
        ]);

        $hasil = User::whereId(Auth::user()->id)->update($validatedData);

        if ($hasil) {
            return redirect()->route('dashboard.profile')->with('success', 'Profile berhasil diperbarui!');
        }
        return redirect()->route('dashboard.profile')->with('error', 'Profile gagal diperbarui!');
    }

    public function profile_password(Request $request)
    {
        $validatedData = $request->validate([
            'password_old'      => 'required',
            'password_new'      => 'required',
            'password_confirm'  => 'required',
        ]);

        if (Hash::check($validatedData['password_new'], Auth::user()->password)) {
            return redirect()->route('dashboard.profile')->with('warning', 'Password baru anda sama dengan password lama!');
        }
    
        if (!Hash::check($validatedData['password_old'], Auth::user()->password)) {
            return redirect()->route('dashboard.profile')->with('error', 'Password lama anda salah!');
        }
    
        if ($validatedData['password_new'] != $validatedData['password_confirm']) {
            return redirect()->route('dashboard.profile')->with('error', 'Konfirmasi Password anda berbeda!');
        }
        
        $hasil = User::whereId(Auth::user()->id)->update(['password' => Hash::make($validatedData['password_new'])]);
    
        if ($hasil) {
            return redirect()->route('dashboard.profile')->with('success', 'Password berhasil diperbarui!');
        }
        return redirect()->route('dashboard.profile')->with('error', 'Password gagal diperbarui!');
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

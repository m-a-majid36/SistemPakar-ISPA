<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.admin.user.index', [
            "users"  => User::latest()->where('id', '!=', Auth::user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.user.create', [
            "provinces" => Province::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'          => 'required',
            'role'          => 'required',
            'email'         => 'required|email:dns|unique:users',
            'username'      => 'required|unique:users',
            'phone'         => 'required|unique:users|min:8|max:20',
            'gender'        => 'required',
            'address'       => 'required',
            'province_id'   => 'required',
            'regency_id'    => 'required',
            'district_id'   => 'required',
            'village_id'    => 'required',
        ]);

        $validatedData['password'] = Hash::make('password');

        $hasil = User::create($validatedData);

        if ($hasil) {
            return redirect()->route('user.index')->with('success', 'Akun Pengguna berhasil ditambahkan!');
        }
        return redirect()->route('user.index')->with('error', 'Akun Pengguna gagal ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.admin.user.show', [
            "user"  => User::findorFail(decrypt($id))
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::findorFail(decrypt($id));

        return view('backend.admin.user.edit', [
            "user"      => $data,
            "provinces" => Province::all(),
            "regencies" => Regency::where('province_id', $data->regency->province_id)->get(),
            "districts" => District::where('regency_id', $data->district->regency_id)->get(),
            "villages"  => Village::where('district_id', $data->village->district_id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name'          => 'required',
            'role'          => 'required',
            'email'         => 'required|email:dns|unique:users,email,' . $id,
            'username'      => 'required|unique:users,username,' . $id,
            'phone'         => 'required|min:8|max:20|unique:users,phone,' . $id,
            'gender'        => 'required',
            'address'       => 'required',
            'province_id'   => 'required',
            'regency_id'    => 'required',
            'district_id'   => 'required',
            'village_id'    => 'required',
        ]);

        $hasil = User::whereId($id)->update($validatedData);

        if ($hasil) {
            return redirect()->route('user.index')->with('success', 'Data Pengguna berhasil diperbarui!');
        }
        return redirect()->route('user.index')->with('error', 'Data Pengguna gagal diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findorFail($id);

        $hasil = $data->delete();

        if ($hasil) {
            return redirect()->route('user.index')->with('success', 'Akun Pengguna berhasil dihapus!');
        }
        return redirect()->route('user.index')->with('error', 'Akun Pengguna gagal dihapus!');
    }

    public function reset($id)
    {
        User::whereId($id)->update(['password' => Hash::make('secret')]);

        return redirect()->route('user.index')->with('success', 'Password Pengguna berhasil direset!');
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

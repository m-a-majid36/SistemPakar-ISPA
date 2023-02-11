<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Disease;
use App\Models\History;
use App\Models\Regency;
use App\Models\Symptom;
use App\Models\Village;
use App\Models\District;
use App\Models\Frontend;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function home()
    {
        $data = Frontend::whereId(1)->first();

        return view('frontend.home', compact('data'));
    }

    public function diagnosis()
    {
        if (Auth::user()) {
            return view('frontend.diagnosis', [
                'data'      => Frontend::whereId(1)->first(),
                'histories' => History::where('user_id', Auth::user()->id)->latest()->get(),
            ]);
        } else {
            return view('frontend.diagnosis', [
                'data'      => Frontend::whereId(1)->first(),
            ]);
        }
    }

    public function diagnosis_create()
    {
        return view('frontend.diagnosis.create', [
            'data'      => Frontend::whereId(1)->first(),
            'diseases'  => Disease::all()
        ]);
    }

    public function findPEH($symptom, $inputDiseases)
    {
        $PEH = array();
            foreach ($symptom->diseases as $disease) {
                foreach ($inputDiseases as $inputDisease) {
                    if ($disease->id == $inputDisease) {
                        $PEH[] = $disease->pivot->score;
                    }
                }
            }
        return $PEH;
    }

    public function findNS($PEH)
    {
        $Nilai_Semesta = 0;
        foreach ($PEH as $NS) {
            $Nilai_Semesta += $NS;
        }

        return $Nilai_Semesta;
    }

    public function findPH($PEH, $Nilai_Semesta, $ni)
    {
        $PH = array_fill(0, $ni, 0);
        for ($i = 0; $i < $ni; $i++) {
            $PH[$i] = $PEH[$i] / $Nilai_Semesta;
        }
        return $PH;
    }

    public function findH($PH, $PEH, $ni)
    {
        $H = 0;
        $Hi = array_fill(0, $ni, 0);

        for ($i = 0; $i < $ni; $i++) {
            $Hi[$i] = $PH[$i] * $PEH[$i];
        }

        foreach ($Hi as $Hin) {
            $H += $Hin;
        }

        return $H;
    }

    public function findPHE($PH, $PEH, $H, $ni)
    {
        $PHE = array_fill(0, $ni, 0);
        for ($i=0; $i<$ni; $i++) {
            $PHE[$i] = ($PH[$i] * $PEH[$i]) / $H;
        }
        return $PHE;
    }

    public function findBi($PHE, $PEH, $ni)
    {
        $Bi = array_fill(0, $ni, 0);
        for ($i=0; $i<$ni; $i++) {
            $Bi[$i] = $PHE[$i] * $PEH[$i];
        }
        return $Bi;
    }

    public function findBn($Bi)
    {
        $Bn = 0;
        foreach ($Bi as $Bin) {
            $Bn += $Bin;
        }
        return $Bn;
    }

    public function findBayes($symptoms, $inputDiseases)
    {
        $Bayes = array();
        foreach ($symptoms as $symptom) {
            $PEH            = $this->findPEH($symptom, $inputDiseases); //Array score gejala
            $Nilai_Semesta  = $this->findNS($PEH); //Nilai Semesta
            $ni             = count($PEH); //Jumlah gejala yg sesuai
            $PH             = $this->findPH($PEH, $Nilai_Semesta, $ni); //Array nilai PHi
            $H              = $this->findH($PH, $PEH, $ni); //Array nilai H
            $PHE            = $this->findPHE($PH, $PEH, $H, $ni); //Array nilai PHE
            $Bi             = $this->findBi($PHE, $PEH, $ni); //Array nilai Bi
            $Bn             = $this->findBn($Bi); //Total B suatu penyakit
            $symptom_id     = $symptom->id; //Id penyakit
            
            $Bayes[$symptom_id] = $Bn;
        }

        return $Bayes;
    }

    public function findHasil($Bayes)
    {
        $Hasil = 0;
        $largest = 0;
        foreach ($Bayes as $symptom_id => $nilaiBayes) {
            if ($nilaiBayes > $largest) {
                $largest = $nilaiBayes;
                $Hasil = $symptom_id;
            }
        }

        return $Hasil;
    }

    public function diagnosis_store(Request $request)
    {
        $symptoms = Symptom::all(); //Penyakit
        $inputDiseases = collect($request->input('disease', [])); //Array id disease yg dipilih
        $Bayes = $this->findBayes($symptoms, $inputDiseases); //Array asosiatif id penyakit => nilai bayes
        $Hasil = $this->findHasil($Bayes);

        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['symptom_id'] = $Hasil;

        $history = History::create($validatedData);
        $history->diseases()->sync($inputDiseases);

        if ($history) {
            return redirect()->route('diagnosis')->with('success', 'Diagnosa berhasil dibuat!');
        }
        return redirect()->route('diagnosis')->with('error', 'Diagnosa gagal dibuat!');
    }

    public function info()
    {
        $data = Frontend::whereId(1)->first();
        $symptoms = Symptom::all();

        return view('frontend.info', compact('data', 'symptoms'));
    }

    public function profile()
    {
        return view('frontend.profile', [
            "data"      => Frontend::whereId(1)->first(),
            "user"      => Auth::user(),
            "provinces" => Province::all(),
            "regencies" => Regency::where('province_id', Auth::user()->regency->province_id)->get(),
            "districts" => District::where('regency_id', Auth::user()->district->regency_id)->get(),
            "villages"  => Village::where('district_id', Auth::user()->village->district_id)->get()
        ]);
    }

    public function profile_update(Request $request)
    {
        $validatedData = $request->validate([
            'name'              => 'required',
            'email'             => 'required|email:dns|unique:users,email,' . Auth::user()->id,
            'username'          => 'required|unique:users,username,' . Auth::user()->id,
            'phone'             => 'required|min:9|max:20|unique:users,phone,' . Auth::user()->id,
            'gender'            => 'required',
            'province_id'       => 'required',
            'regency_id'        => 'required',
            'district_id'       => 'required',
            'village_id'        => 'required',
            'address'           => 'required',
        ]);

        $hasil = User::whereId(Auth::user()->id)->update($validatedData);

        if ($hasil) {
            return redirect()->route('home.profile')->with('success', 'Profile berhasil diperbarui!');
        }
        return redirect()->route('home.profile')->with('error', 'Profile gagal diperbarui!');
    }

    public function profile_password(Request $request)
    {
        $validatedData = $request->validate([
            'password_old'      => 'required',
            'password_new'      => 'required',
            'password_confirm'  => 'required',
        ]);

        if (Hash::check($validatedData['password_new'], Auth::user()->password)) {
            return redirect()->route('home.profile')->with('warning', 'Password baru anda sama dengan password lama!');
        }
    
        if (!Hash::check($validatedData['password_old'], Auth::user()->password)) {
            return redirect()->route('home.profile')->with('error', 'Password lama anda salah!');
        }
    
        if ($validatedData['password_new'] != $validatedData['password_confirm']) {
            return redirect()->route('home.profile')->with('error', 'Konfirmasi Password anda berbeda!');
        }
        
        $hasil = User::whereId(Auth::user()->id)->update(['password' => Hash::make($validatedData['password_new'])]);
    
        if ($hasil) {
            return redirect()->route('home.profile')->with('success', 'Password berhasil diperbarui!');
        }
        return redirect()->route('home.profile')->with('error', 'Password gagal diperbarui!');
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

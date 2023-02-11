<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.doctor.disease.index', [
            "diseases" => Disease::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.doctor.disease.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(['name' => 'required']);

        $hasil = Disease::create($validatedData);

        if ($hasil) {
            return redirect()->route('disease.index')->with('success', 'Data gejala berhasil ditambahkan!');
        }
        return redirect()->route('disease.index')->with('error', 'Data gejala gagal ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function show(disease $disease)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function edit($disease)
    {
        return view('backend.doctor.disease.edit', [
            "disease"   => Disease::findorFail(decrypt($disease)),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $disease)
    {
        $validatedData = $request->validate([
            'name'  => 'required'
        ]);

        $hasil = Disease::whereId($disease)->update($validatedData);

        if ($hasil) {
            return redirect()->route('disease.index')->with('success', 'Data gejala berhasil diperbarui!');
        }
        return redirect()->route('disease.index')->with('error', 'Data gejala gagal diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function destroy($disease)
    {
        $data = Disease::findorFail($disease);

        $hasil = $data->delete();

        if ($hasil) {
            return redirect()->route('disease.index')->with('success', 'Data gejala berhasil dihapus!');
        }
        return redirect()->route('disease.index')->with('error', 'Data gejala gagal dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Symptom;
use Illuminate\Http\Request;

class SymptomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.doctor.symptom.index', [
            "symptoms"  => Symptom::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.doctor.symptom.create');
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
            'name'          =>'required',
            'description'   => 'required'
        ]);

        $hasil = Symptom::create($validatedData);

        if ($hasil) {
            return redirect()->route('symptom.index')->with('success', 'Data penyakit berhasil ditambahkan!');
        }
        return redirect()->route('symptom.index')->with('error', 'Data penyakit gagal ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\symptom  $symptom
     * @return \Illuminate\Http\Response
     */
    public function show(symptom $symptom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\symptom  $symptom
     * @return \Illuminate\Http\Response
     */
    public function edit($symptom)
    {
        return view('backend.doctor.symptom.edit', [
            "symptom"   => Symptom::findorFail(decrypt($symptom)),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\symptom  $symptom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $symptom)
    {
        $validatedData = $request->validate([
            'name'          => 'required',
            'description'   => 'required'
        ]);

        $hasil = Symptom::whereId($symptom)->update($validatedData);

        if ($hasil) {
            return redirect()->route('symptom.index')->with('success', 'Data penyakit berhasil diperbarui!');
        }
        return redirect()->route('symptom.index')->with('error', 'Data penyakit gagal diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\symptom  $symptom
     * @return \Illuminate\Http\Response
     */
    public function destroy($symptom)
    {
        $data = Symptom::findorFail($symptom);

        $hasil = $data->delete();

        if ($hasil) {
            return redirect()->route('symptom.index')->with('success', 'Data penyakit berhasil dihapus!');
        }
        return redirect()->route('symptom.index')->with('error', 'Data penyakit gagal dihapus!');
    }
}

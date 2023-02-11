<?php

namespace App\Http\Controllers;

use App\Models\Treatment;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.doctor.treatment.index', [
            "treatments" => Treatment::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.doctor.treatment.create');
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

        $hasil = Treatment::create($validatedData);

        if ($hasil) {
            return redirect()->route('treatment.index')->with('success', 'Data perawatan berhasil ditambahkan!');
        }
        return redirect()->route('treatment.index')->with('error', 'Data perawatan gagal ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Treatment  $treatment
     * @return \Illuminate\Http\Response
     */
    public function show(Treatment $treatment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Treatment  $treatment
     * @return \Illuminate\Http\Response
     */
    public function edit($treatment)
    {
        return view('backend.doctor.treatment.edit', [
            "treatment" => Treatment::findorFail(decrypt($treatment)),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Treatment  $treatment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $treatment)
    {
        $validatedData = $request->validate(['name' => 'required']);

        $hasil = Treatment::whereId($treatment)->update($validatedData);

        if ($hasil) {
            return redirect()->route('treatment.index')->with('success', 'Data perawatan berhasil diperbarui!');
        }
        return redirect()->route('treatment.index')->with('error', 'Data perawatan gagal diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Treatment  $treatment
     * @return \Illuminate\Http\Response
     */
    public function destroy($treatment)
    {
        $data = Treatment::findorFail($treatment);

        $hasil = $data->delete();

        if ($hasil) {
            return redirect()->route('treatment.index')->with('success', 'Data perawatan berhasil dihapus!');
        }
        return redirect()->route('treatment.index')->with('error', 'Data perawatan gagal dihapus!');
    }
}

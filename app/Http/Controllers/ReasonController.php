<?php

namespace App\Http\Controllers;

use App\Models\Reason;
use Illuminate\Http\Request;

class ReasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.doctor.reason.index', [
            "reasons" => Reason::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.doctor.reason.create');
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
            'name'      => 'required',
            'category'  => 'required'
        ]);

        $hasil = Reason::create($validatedData);

        if ($hasil) {
            return redirect()->route('reason.index')->with('success', 'Data penyebab berhasil ditambahkan!');
        }
        return redirect()->route('reason.index')->with('error', 'Data penyebab gagal ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reason  $reason
     * @return \Illuminate\Http\Response
     */
    public function show(Reason $reason)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reason  $reason
     * @return \Illuminate\Http\Response
     */
    public function edit($reason)
    {
        return view('backend.doctor.reason.edit', [
            "reason" => Reason::findorFail(decrypt($reason))
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reason  $reason
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $reason)
    {
        $validatedData = $request->validate([
            'name'      => 'required',
            'category'  => 'required'
        ]);

        $hasil = Reason::whereId($reason)->update($validatedData);

        if ($hasil) {
            return redirect()->route('reason.index')->with('success', 'Data penyebab berhasil diperbarui!');
        }
        return redirect()->route('reason.index')->with('error', 'Data penyebab gagal diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reason  $reason
     * @return \Illuminate\Http\Response
     */
    public function destroy($reason)
    {
        $data = Reason::findorFail($reason);

        $hasil = $data->delete();

        if ($hasil) {
            return redirect()->route('reason.index')->with('success', 'Data penyebab berhasil dihapus!');
        }
        return redirect()->route('reason.index')->with('error', 'Data penyebab gagal dihapus!');
    }
}

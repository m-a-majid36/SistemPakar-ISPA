<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\Reason;
use App\Models\Symptom;
use App\Models\Treatment;
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
        return view('backend.doctor.symptom.create', [
            "diseases"      => Disease::all(),
            "reasons"       => Reason::all(),
            "treatments"    => Treatment::all()
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
            'name'          =>'required',
            'description'   => 'required'
        ]);

        $diseases = collect($request->input('diseases', []))
            ->map(function($disease) {
                return ['score' => $disease];
            });
        $reasons = collect($request->input('reason', []));
        $treatments = collect($request->input('treatment', []));

        $symptom = Symptom::create($validatedData);
        $symptom->diseases()->sync($diseases);
        $symptom->reasons()->sync($reasons);
        $symptom->treatments()->sync($treatments);

        if ($symptom) {
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
    public function show($symptom)
    {
        return view('backend.doctor.symptom.show', [
            "symptom" => Symptom::findorFail(decrypt($symptom)),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\symptom  $symptom
     * @return \Illuminate\Http\Response
     */
    public function edit($symptom)
    {
        $symptom = Symptom::findorFail(decrypt($symptom));

        $symptom->load('diseases');
        $symptom->load('reasons');
        $symptom->load('treatments');
        
        $diseases = Disease::get()->map(function($disease) use ($symptom) {
            $disease->value = data_get($symptom->diseases->firstWhere('id', $disease->id), 'pivot.score') ?? null;
            return $disease;
        });

        $reasons = Reason::get()->map(function($reason) use ($symptom) {
            $reason->value = data_get($symptom->reasons->firstWhere('id', $reason->id), 'pivot') ?? null;
            return $reason;
        });

        $treatments = Treatment::get()->map(function($treatment) use ($symptom) {
            $treatment->value = data_get($symptom->treatments->firstWhere('id', $treatment->id), 'pivot') ?? null;
            return $treatment;
        });

        return view('backend.doctor.symptom.edit', compact('symptom', 'diseases', 'reasons', 'treatments'));
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

        $diseases = collect($request->input('diseases', []))
            ->map(function($disease) {
                return ['score' => $disease];
            });        
        $reasons = collect($request->input('reason', []));
        $treatments = collect($request->input('treatment', []));

        $hasil = Symptom::whereId($symptom)->first()->update($validatedData);
        // $hasil->diseases()->sync($diseases);
        $hasil->reasons()->sync($reasons);
        $hasil->treatments()->sync($treatments);

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

    public function mapDiseases($diseases)
    {
        return collect($diseases)->map(function ($i) {
            return ['score' => $i];
        });
    }
}

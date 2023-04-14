<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\User;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.doctor.history.index', [
            "histories" => History::latest()->get(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function show($history)
    {
        return view('backend.doctor.history.show', [
            "user"      => User::findOrFail(decrypt($history)),
            "histories" => History::where('user_id', decrypt($history))->latest()->get(),
        ]);
    }
}

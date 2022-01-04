<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Struktur1;
use Illuminate\Http\Request;

class Struktur1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $strukturs = DB::table('strukturs')->get();
        return view('Tampil.Tstruktur.index')->with('strukturs', $strukturs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Struktur1  $struktur1
     * @return \Illuminate\Http\Response
     */
    public function show(Struktur1 $struktur1)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Struktur1  $struktur1
     * @return \Illuminate\Http\Response
     */
    public function edit(Struktur1 $struktur1)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Struktur1  $struktur1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Struktur1 $struktur1)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Struktur1  $struktur1
     * @return \Illuminate\Http\Response
     */
    public function destroy(Struktur1 $struktur1)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Tnilai;
use App\Models\Nilai;
use Illuminate\Http\Request;

class TnilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $Tnilai = Nilai::where('nim_id', 'LIKE', '%' .$request->search.'%')->paginate(5);
        }else{
            $Tnilai = Nilai::paginate(5);
        }

    $Tnilai = [
     
        'Tnilai' => $this->Tnilai->allData()
    ];
    
    return view('Tampil.Tnilai.index', $Tnilai,  compact('Tnilai'));
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
     * @param  \App\Models\Tnilai  $tnilai
     * @return \Illuminate\Http\Response
     */
    public function show(Tnilai $tnilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tnilai  $tnilai
     * @return \Illuminate\Http\Response
     */
    public function edit(Tnilai $tnilai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tnilai  $tnilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tnilai $tnilai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tnilai  $tnilai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tnilai $tnilai)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Makul;
use App\Models\Dosen;
use Illuminate\Http\Request;

class MakulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $makuls = Makul::with('dosens')->get();
        if($request->has('search')){
            $makuls = Makul::with('dosens')->where('name', 'LIKE', '%' .$request->search.'%')->paginate(5);
        }else{
            $makuls = Makul::with('dosens')->paginate(5);
        }
        // return $makuls;
        // $makuls = Makul::with('dosens')->get();
        // return $makuls;
        return view('Fitur.Makul.index', compact('makuls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dosens = Dosen::all();
        // return view('program/create', compact('dosens'));
        return view('Fitur.Makul.create', compact('dosens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'kdmakul' => 'required|unique:makuls',
            'nama_makul' => 'required',
            'semester' => 'required',
            'dosens_id' => 'required',
        ],
        [
            'kdmakul.required' => 'Kode MataKuliah tidak boleh kosong',
            'nama_makul.required' => 'Nama Mata Kuliah tidak boleh kosong',
            'semester.required' => 'Semester Kuliah tidak boleh kosong',
            'dosens_id.required' => 'Nama Dosen  tidak boleh kosong',
        ]);
        $makuls = new Makul;
        $makuls-> kdmakul = $request->kdmakul;
        $makuls-> nama_makul = $request->nama_makul;
        $makuls-> semester = $request->semester;
        $makuls->dosens_id = $request->dosens_id;
        $makuls->save();
            // Makul::create($request->all());
        return redirect('makul')->with('status', 'Mata Kuliah Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Makul  $makul
     * @return \Illuminate\Http\Response
     */
    public function show(Makul $makul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Makul  $makul
     * @return \Illuminate\Http\Response
     */
    public function edit(Makul $makul)
    {
        $dosens = Dosen::all();
        return view('Fitur.makul.edit', compact('makul', 'dosens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Makul  $makul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Makul $makul)
    {
        $request->validate([
            'kdmakul' => 'required|unique:makuls',
            'nama_makul' => 'required',
            'semester' => 'required',
            'dosens_id' => 'required',
        ],
        [
            'kdmakul.required' => 'Kode MataKuliah tidak boleh kosong',
            'nama_makul.required' => 'Nama Mata Kuliah tidak boleh kosong',
            'semester.required' => 'Semester Kuliah tidak boleh kosong',
            'dosens_id.required' => 'Nama Dosen  tidak boleh kosong',
        ]);

        $makul-> kdmakul = $request->kdmakul;
        $makul-> nama_makul = $request->nama_makul;
        $makul-> semester = $request->semester;
        $makul->dosens_id = $request->dosens_id;
        $makul->save();
        return redirect('makul')->with('status', 'Mata Kuliah Berhasil Di Update');

        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Makul  $makul
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $makul = Makul::find($id);
        $makul->delete();
        
        return redirect('makul')->with('status', 'Mata Kuliah Berhasil Di Hapus');
    }
}

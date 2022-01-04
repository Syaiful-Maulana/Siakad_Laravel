<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $mahasiswa = Mahasiswa::where('name', 'LIKE', '%' .$request->search.'%')->paginate(5);
        }else{
            $mahasiswa = Mahasiswa::paginate(5);
        }
        
        // $mahasiswa = Mahasiswa::all();
        return view('Fitur.Mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Fitur.Mahasiswa.create');
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
            'nama' => 'required',
            'nim' => 'required|unique:mahasiswas',
            'jekel' => 'required',
            'tempat' => 'required',
            'tanggal_lhr' => 'required',
            'alamat' => 'required',
        ],
        [
            'nama.required' => 'Nama Tidak Boleh Kosong',
            'nim.required' => 'NIM tidak boleh kosong',
            'jekel.required' => 'Jenis Kelamin tidak boleh kosong',
            'tempat.required' => 'Tempat Lahor  tidak boleh kosong',
            'tanggal_lhr.required' => 'Tanggal Lahir  tidak boleh kosong',
            'alamat.required' => 'Alamat  tidak boleh kosong',
        ]);
        $mahasiswa = new Mahasiswa();
        $mahasiswa-> nama = $request->nama;
        $mahasiswa-> nim = $request->nim;
        $mahasiswa-> jekel = $request->jekel;
        $mahasiswa->tempat = $request->tempat;
        $mahasiswa->tanggal_lhr = $request->tanggal_lhr;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->save();

        // Mahasiswa::create($request->all());

        // return $request;

        return redirect('mahasiswa')->with('status', 'Data Mahasiswa Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        // return $mahasiswa;
        // $mahasiswa = Mahasiswa::all();
        return view('Fitur.Mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('Fitur.Mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
       
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:mahasiswas',
            'jekel' => 'required',
            'tempat' => 'required',
            'tanggal_lhr' => 'required',
            'alamat' => 'required',
        ],
        [
            'nama.required' => 'Nama Tidak Boleh Kosong',
            'nim.required' => 'NIM tidak boleh kosong',
            'jekel.required' => 'Jenis Kelamin tidak boleh kosong',
            'tempat.required' => 'Tempat Lahor  tidak boleh kosong',
            'tanggal_lhr.required' => 'Tanggal Lahir  tidak boleh kosong',
            'alamat.required' => 'Alamat  tidak boleh kosong',
        ]);

          Mahasiswa::where('id', $mahasiswa->id)
                    ->update([
                        'nama' => $request->nama,
                        'nim' => $request->nim,
                        'jekel' => $request->jekel,
                        'tempat' => $request->tempat,
                        'tanggal_lhr' => $request->tanggal_lhr,
                        'alamat' => $request->alamat
           ]);


        return redirect('mahasiswa')->with('status', 'Data Mahasiswa Berhasil Di Update');
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();
        return redirect('mahasiswa')->with('status', 'Mahasiswa Berhasil Di Hapus');
    }
}

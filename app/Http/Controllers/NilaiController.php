<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Dosen;
use App\Models\Makul;
use App\Models\Mahasiswa;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    public function __construct()
    {
        $this->Nilai = new Nilai();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
            if($request->has('search')){
                $nilai = Nilai::where('nim_id', 'LIKE', '%' .$request->search.'%')->paginate(5);
            }else{
                $nilai = Nilai::paginate(5);
            }

        $nilai = [
            // 'nilai' => DB::table('nilais')->paginate(5),
            'nilai' => $this->Nilai->allData()
        ];
        
        return view('Fitur.Nilai.index', $nilai, compact('nilai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dosens = Dosen::all();
        $makuls = Makul::all();
        $nilai = Nilai::all();
        $mahasiswas = Mahasiswa::all();
        $kelas = Kelas::all();
        // return $mahasiswas;
        return view('Fitur.Nilai.create', compact('dosens', 'nilai','mahasiswas','kelas','makuls' ));
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
            'nim_id' => 'required',
            'nama_id' => 'required',
            'makul_id' => 'required',
            'dosens_id' => 'required',
            'kelas_id' => 'required',
            'nilai' => 'required',
        ],
        [
            'nim_id.required' => 'Kode MataKuliah tidak boleh kosong',
            'nama_id.required' => 'Nama Mata Kuliah tidak boleh kosong',
            'makul_id.required' => 'Semester Kuliah tidak boleh kosong',
            'dosens_id.required' => 'Nama Dosen  tidak boleh kosong',
            'kelas_id.required' => 'Nama Dosen  tidak boleh kosong',
            'nilai.required' => 'Nilai  tidak boleh kosong',
        ]);
        $nilai = new Nilai;
        $nilai->nim_id = $request->nim_id;
        $nilai->nama_id = $request->nama_id;
        $nilai->makul_id = $request->makul_id;
        $nilai->dosens_id = $request->dosens_id;
        $nilai->kelas_id = $request->kelas_id;
        $nilai->nilai = $request->nilai;
        $nilai->save();
        // Nilai::create($request->all());
        return redirect('nilai')->with('status', 'Nilai Berhasil Ditambah');
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function show(Nilai $nilai)
    {   
        

        return view('Fitur.Nilai.show', compact('nilai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilai $nilai)
    {
        // $nilai = Nilai::with('dosens', 'makul','kelas','mahasiswas')->get();

        $dosens = Dosen::all();
        $makul = Makul::all();
        $kelas = Kelas::all();
        $mahasiswas = Mahasiswa::all();
        return view('Fitur.Nilai.edit', compact('dosens', 'nilai', 'makul','kelas','mahasiswas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nilai $nilai)
    {
        $request->validate([
            'nim_id' => 'required',
            'nama_id' => 'required',
            'makul_id' => 'required',
            'dosens_id' => 'required',
            'kelas_id' => 'required',
            'nilai' => 'required',
        ],
        [
            'nim_id.required' => 'Kode MataKuliah tidak boleh kosong',
            'nama_id.required' => 'Nama Mata Kuliah tidak boleh kosong',
            'makul_id.required' => 'Semester Kuliah tidak boleh kosong',
            'dosens_id.required' => 'Nama Dosen  tidak boleh kosong',
            'kelas_id.required' => 'Nama Dosen  tidak boleh kosong',
            'nilai.required' => 'Nama Dosen  tidak boleh kosong',
        ]);

        $nilai-> nim_id = $request->nim_id;
        $nilai-> nama_id = $request->nama_id;
        $nilai-> makul_id = $request->makul_id;
        $nilai->dosens_id = $request->dosens_id;
        $nilai->kelas_id = $request->kelas_id;
        $nilai->nilai = $request->nilai;
        $nilai->save();
            // Makul::create($request->all());
        return redirect('makul')->with('status', 'Mata Kuliah Berhasil Ditambah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nilai = Nilai::find($id);
        $nilai->delete();
        
        return redirect('kelas')->with('status', 'Data Kelas Berhasil Di Hapus');
    }
}

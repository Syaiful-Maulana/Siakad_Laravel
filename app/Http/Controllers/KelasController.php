<?php

namespace App\Http\Controllers;


use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\Makul;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $kelas = Kelas::where('name', 'LIKE', '%' .$request->search.'%')->paginate(5);
        }else{
            $kelas = Kelas::paginate(5);
        }
        // return $kelas;
        return view('Fitur.Kelas.index')->with('kelas', $kelas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $makuls = Makul::all();
        return view('Fitur.Kelas.create', compact('makuls'));
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
            'makuls_id' => 'required',
            'namaKelas' => 'required|unique:kelas',
            'ruangan' => 'required|unique:kelas',
            'waktu' => 'required|unique:kelas',
        ],
        [
            'makuls_id.required' => 'Nama Mata Kuliah Tidak Boleh Kosong',
            'namaKelas.required' => 'Nama Kelas tidak boleh kosong',
            'ruangan.required' => 'Ruangan tidak boleh kosong',
            'waktu.required' => 'Waktu  tidak boleh kosong',
        ]);
        $kelas = new Kelas;
        $kelas-> makuls_id = $request->makuls_id;
        $kelas-> namaKelas = $request->namaKelas;
        $kelas-> ruangan = $request->ruangan;
        $kelas->waktu = $request->waktu;
        $kelas->save();
        return redirect('kelas')->with('status', 'Mata Kuliah Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelas = Kelas::find($id);
        // return $kelas;
        // $kelas = $kelas->makeHidden(['makuls_id']);
        return view('Fitur.Kelas.show', compact('kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = Kelas::find($id);
        // return $kelas;
        $makuls = Makul::all();
        return view('Fitur.kelas.edit', compact('kelas', 'makuls'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'makuls_id' => 'required',
            'namaKelas' => 'required|unique:kelas',
            'ruangan' => 'required|unique:kelas',
            'waktu' => 'required|unique:kelas',
        ],
        [
            'makuls_id.required' => 'Nama Mata Kuliah Tidak Boleh Kosong',
            'namaKelas.required' => 'Nama Kelas tidak boleh kosong',
            'ruangan.required' => 'Ruangan tidak boleh kosong',
            'waktu.required' => 'Waktu  tidak boleh kosong',
        ]);
        $kelas =  DB::table('kelas')->where('id', $id)
                 ->update([
                        'makuls_id' => $request->makuls_id,
                        'namaKelas' => $request->namaKelas,
                        'ruangan'   => $request->ruangan,
                        'waktu'     => $request->waktu
        ]);


        return redirect('kelas')->with('status', 'Mata Kuliah Berhasil Di Update');

        // return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = Kelas::find($id);
        $kelas->delete();
        
        return redirect('kelas')->with('status', 'Data Kelas Berhasil Di Hapus');
    }
}

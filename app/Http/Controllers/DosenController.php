<?php

namespace App\Http\Controllers;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index(Request $request)
    {
        // $dosens = Dosen::paginate(5);
        if($request->has('search')){
            $dosens = Dosen::where('name', 'LIKE', '%' .$request->search.'%')->paginate(5);
        }else{
            $dosens = Dosen::paginate(5);
        }
        
        return view('Fitur.Dosen.index')->with('dosens', $dosens);
    }
    public function add()
    {
        return view('Fitur.Dosen.add');
    }
    public function addProcess(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'nidn' => 'required|unique:dosens',
            'email' => 'email|unique:dosens',
    ],
    [
        'name.required' => 'Nama Jenjang tidak boleh kosong',
        'nidn.required' => 'NIDN tidak boleh kosong',
        'email.required' => 'Email tidak boleh kosong'
    ]);
        DB::table('dosens')->insert([

            'name' => $request->name,
            'nidn' => $request->nidn,
            'email' => $request->email,
        ]);
        return redirect('dosen')->with('status', 'Data Dosen Berhasil Ditambah');
    }
    public function edit($id)
    { 
    $dosens =  DB::table('dosens')->where('id', $id)->first();
        return view('Fitur.Dosen.edit', compact('dosens'));
    }
    public function editProcess(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:5',
            'nidn' => 'required|unique:dosens',
            'email' => 'email|unique:dosens',
    ],
    [
        'name.required' => 'Nama Jenjang tidak boleh kosong',
        'nidn.required' => 'NIDN tidak boleh kosong',
        'email.required' => 'Email tidak boleh kosong'
    ]);
        $dosens =  DB::table('dosens')->where('id', $id)
                                           ->update([
                                            'name' => $request->name,
                                            'nidn' => $request->nidn,
                                            'email' => $request->email,
                                           ]);
        return redirect('dosen')->with('status', 'Jenjang Berhasil Di Update');
    }
    public function delete($id)
    {
        DB::table('dosens')->where('id', $id)->delete();
        return redirect('dosen')->with('status', 'Data Berhasil Di Hapus');
    }


}

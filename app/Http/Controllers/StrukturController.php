<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Struktur;
use Illuminate\Support\Str;
class StrukturController extends Controller
{
    public function struktur(){
        $strukturs = DB::table('strukturs')->get();
        return view('Dashboard.StrukturOrganisasi.Struktur')->with('strukturs', $strukturs);
    }
    public function prosesStruktur(Request $request)
    {
        DB::table('strukturs')->insert($request->only([ 'name', 'nama_jabatan']));
        return redirect('struktur')->with('status', 'Data Berhasil Ditambah');;
    }
    public function edit($id)
    {    
    $strukturs = DB::table('strukturs')->where('id', $id)->first(); 
    return view('Dashboard.StrukturOrganisasi.Struktur')->with('strukturs', $strukturs);
    }
    public function editProcess(Request $request, $id)
    {
        $strukturs = DB::table('strukturs')->where('id', $id)->first(); 
        return view('Dashboard.StrukturOrganisasi.Struktur')->with('strukturs', $strukturs);
        $validated = $request->validate([
            'name' => 'required|min:5',
            'nama_jabatan' => 'required'
        ],
        [
            'name.required' => 'Nama tidak boleh kosong',
            'nama_jabatan.required' => 'Jabatan tidak boleh kosong'
        ]);
        $strukturs =  DB::table('strukturs')->where('id', $id)
                                            ->update([
                                            'name' => $request->name,
                                            'nama_jabatan' => $request->nama_jabatan
                                           ]);
        return redirect('struktur')->with('status', 'Data Berhasil Di Update');
    }
    public function delete($id){
        
        DB::table('strukturs')->where('id', $id)->delete();
        return redirect('struktur')->with('status', 'Data Berhasil Di Hapus');
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tnilai extends Model
{
    public function allData()
    {
        return DB::table('nilais')
        ->join('mahasiswas', 'mahasiswas.id', '=', 'nilais.nim_id')
        // ->join('mahasiswas', 'mahasiswas.id', '=', 'nilais.nama_id')
        ->select('nilais.*', 'mahasiswas.nim')
        ->get();
    }


    public function dosens()
    {
        return $this->belongsTo(dosen::class);
    }

    public function makul()
    {
        return $this->belongsTo(Makul::class);
    }


    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
        
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswas';
    protected $primaryKey = 'id';
    protected $fillable= [
        'id','nama','nim','jekel','dosens_id','tempat','tanggal_lhr','alamat'
    ];
    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
}

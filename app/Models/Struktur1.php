<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Struktur1 extends Model
{
    use SoftDeletes;
    protected $table = 'struktur';
    protected $fillable = [
        'nama_jabatan',
        'parent_id',
        'name',
    ];
    protected $hidden;
}

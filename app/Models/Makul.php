<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Makul extends Model
{
    // use SoftDeletes;
    // protected $guarded = [];
    public function dosens()
    {
        return $this->belongsTo(dosen::class);
    }
}

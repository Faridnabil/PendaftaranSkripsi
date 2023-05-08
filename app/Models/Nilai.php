<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $table = "nilai";
    protected $primaryKey = "id";
    protected $fillable = ["id_daftarSidang", "id_prodi", "nilai_penguji"];
    public $timestamp = false;

    public function daftarSidang()
    {
        return $this->belongsTo(daftar_sidang::class,'id_daftarSidang');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class,'id_prodi');
    }
}

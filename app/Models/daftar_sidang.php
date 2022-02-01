<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class daftar_sidang extends Model
{
    use HasFactory;
    protected $table = "daftar_sidang";
    protected $primaryKey = "id";
    protected $fillable = ["nim", "nama", "judul_skripsi", "jenis_sidang", "id_prodi"];


    public function prodi()
    {
        return $this->belongsTo(Prodi::class,'id_prodi');
    }

    public function Sidang()
    {
        return $this->hasMany(Sidang::class);
    }
}

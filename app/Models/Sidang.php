<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sidang extends Model
{
    use HasFactory;
    protected $table = "sidang";
    protected $primaryKey = "id";
    protected $fillable = ["id_daftarSidang", "id_prodi", "nid_dosen", "tanggal", "jam", "ruangan"];
    public $timestamp = false;

    public function daftarSidang()
    {
        return $this->belongsTo(daftar_sidang::class,'id_daftarSidang');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class,'id_prodi');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class,'nid_dosen');
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notaSidang extends Model
{
    use HasFactory;
    protected $table = "nota_sidang";
    protected $primaryKey = "id";
    protected $fillable = ["nid_dosen", "id_pengajuan", "id_prodi", "batas_bimbingan", "status"];
    public $timestamps = false;

    public function prodi()
    {
        return $this->belongsTo(Prodi::class,'id_prodi');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class,'nid_dosen');
    }

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class,'id_pengajuan');
    }
}

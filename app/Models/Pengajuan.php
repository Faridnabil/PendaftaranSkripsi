<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;
    protected $table = "pengajuan";
    protected $primaryKey = "id";
    protected $fillable = ["id", "nim", "judul_proposal", "file_proposal"];
    public $timestamps = false;

    public function mahasiswa()
    {
        return $this->belongsTo(Prodi::class,'nim');
    }
}

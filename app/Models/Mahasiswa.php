<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = "mahasiswa";
    protected $primaryKey = "nim";
    protected $fillable = ["nim", "name", "email", "jenis_kelamin", "id_prodi", "tahun_masuk", "foto"];
    public $timestamps = false;

    public function prodi()
    {
        return $this->belongsTo(Prodi::class,'id_prodi');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }
}

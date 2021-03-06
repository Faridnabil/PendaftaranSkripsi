<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    protected $table = 'prodi';
    protected $primaryKey = 'id';
    protected $fillable = ['id','nama_prodi'];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }

    public function dosen()
    {
        return $this->hasMany(Dosen::class);
    }

    public function nota()
    {
        return $this->hasMany(notaSidang::class);
    }

    public function daftar_sidang()
    {
        return $this->hasMany(daftar_sidang::class);
    }

    public function sidang()
    {
        return $this->hasMany(Sidang::class);
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
}

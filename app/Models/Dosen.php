<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $table = "dosen";
    protected $primaryKey = "nid";
    protected $fillable = ["nid", "nama", "email", "jenis_kelamin", "id_prodi", "foto"];
    public $timestamps = false;

    public function prodi()
    {
        return $this->belongsTo(Prodi::class,'id_prodi');
    }
}
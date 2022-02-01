<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class Pengajuan extends Model
{
    use HasFactory;
    protected $table = "pengajuan";
    protected $primaryKey = "id";
    protected $fillable = ["nim", "judul_proposal", "file", "status"];
    public $timestamps = false;

    public function notaSidang()
    {
        return $this->hasMany(notaSidang::class);
    }

    public function daftar_sidang()
    {
        return $this->hasMany(daftar_sidang::class);
    }
}

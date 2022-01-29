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
    protected $fillable = ["nim", "judul_proposal", "file", "id_status"];
    public $timestamps = false;

    public function status()
    {
        return $this->belongsTo(Status::class,'id_status');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;
    protected $table = "pengajuan";
    protected $primaryKey = "id";
    protected $fillable = ["nim", "judul_proposal", "file_proposal"];
    public $timestamps = false;
}

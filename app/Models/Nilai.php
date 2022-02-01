<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $table = "nilai";
    protected $primaryKey = "id";
    protected $fillable = ["id_sidang", "nilai_penguji", "status"];
    public $timestamp = false;

    public function sidang()
    {
        return $this->belongsTo(Sidang::class,'id_sidang');
    }
}
